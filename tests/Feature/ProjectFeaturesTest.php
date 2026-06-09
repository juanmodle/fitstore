<?php

use App\Jobs\GenerateInvoicePdfJob;
use App\Jobs\SendOrderConfirmationEmailJob;
use App\Mail\ContactReceivedMail;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutVite();
    $this->seed();
});

test('language switch works', function () {
    $this->get(route('language.switch', 'es'))
        ->assertRedirect()
        ->assertCookie('fitstore_locale');

    $this->withSession(['locale' => 'es'])
        ->get('/')
        ->assertOk()
        ->assertSee('Productos')
        ->assertSee('Tienda Fit')
        ->assertSee('Categorias principales')
        ->assertSee('aria-current="true"', false);
});

test('console commands run', function () {
    $this->artisan('fitstore:low-stock-report')->assertSuccessful();
    $this->artisan('fitstore:expire-coupons')->assertSuccessful();
    $this->artisan('fitstore:cleanup-old-carts')->assertSuccessful();
    $this->artisan('fitstore:daily-sales-report')->assertSuccessful();
    $this->artisan('fitstore:recalculate-vip-points')->assertSuccessful();
    $this->artisan('fitstore:create-api-token cliente@gmail.com')->assertSuccessful();
    $this->artisan('fitstore:send-vip-welcome 1')->assertSuccessful();
    $this->artisan('fitstore:choose-giveaway-winner')->assertSuccessful();
});

test('vip subscription creates notification', function () {
    Queue::fake();

    $user = User::where('email', 'cliente@gmail.com')->first();
    $method = PaymentMethod::where('code', 'credit_card')->first();

    $user->subscribeVip($method->id);

    expect($user->fresh()->notifications()->where('title', 'Welcome VIP')->exists())->toBeTrue();
});

test('checkout creates order jobs', function () {
    Queue::fake();

    $user = User::where('email', 'cliente@gmail.com')->first();
    $address = $user->addresses()->first();
    $method = PaymentMethod::where('code', 'credit_card')->first();

    Order::createFromCart($user, [
        'shipping_address_id' => $address->id,
        'billing_address_id' => $address->id,
        'payment_method_id' => $method->id,
        'coupon_code' => null,
    ]);

    Queue::assertPushed(SendOrderConfirmationEmailJob::class);
    Queue::assertPushed(GenerateInvoicePdfJob::class);
});

test('contact form sends email', function () {
    Mail::fake();

    $this->post(route('contact.store'), [
        'name' => 'Student Tester',
        'email' => 'student@example.com',
        'message' => 'This is a valid academic contact message.',
    ])->assertRedirect();

    Mail::assertSent(ContactReceivedMail::class);
});

test('api documentation page works', function () {
    $this->get(route('api.documentation'))
        ->assertOk()
        ->assertSee('FITSTORE API Documentation');
});

test('media upload works', function () {
    Storage::fake('public');

    $admin = User::where('email', 'administrador@gmail.com')->first();

    $this->actingAs($admin)
        ->postJson(route('admin.media-assets.store'), [
            'file' => UploadedFile::fake()->image('protein.jpg'),
        ])
        ->assertOk()
        ->assertJsonPath('message', 'Uploaded');
});

test('catalog filters work', function () {
    $products = Product::active()
        ->withCatalogFilters(['category' => 'supplements', 'search' => 'Whey'])
        ->sortedForCatalog('price_low')
        ->get();

    expect($products)->not->toBeEmpty();
    expect($products->first()->name)->toContain('Whey');
});

test('tag filters match categories', function () {
    $womenTags = \App\Models\Tag::whereHas('products.category', fn ($query) => $query->where('slug', 'women-clothing'))
        ->pluck('name')
        ->all();

    $fitFoodTags = \App\Models\Tag::whereHas('products.category', fn ($query) => $query->where('slug', 'fit-food'))
        ->pluck('name')
        ->all();

    expect($womenTags)->toContain('Clothing');
    expect($womenTags)->not->toContain('Vegan');
    expect($womenTags)->not->toContain('Low Sugar');

    expect($fitFoodTags)->toContain('Vegan');
    expect($fitFoodTags)->toContain('Low Sugar');
    expect($fitFoodTags)->not->toContain('Clothing');
});

test('pdf reports are available', function () {
    $admin = User::where('email', 'administrador@gmail.com')->first();

    $this->actingAs($admin)->get(route('customer.orders.invoice', \App\Models\Order::first()))->assertOk();
    $this->actingAs($admin)->get(route('admin.reports.sales-pdf'))->assertOk();
    $this->actingAs($admin)->get(route('admin.reports.products-pdf'))->assertOk();
    $this->actingAs($admin)->get(route('admin.reports.vip-pdf'))->assertOk();
    $this->actingAs($admin)->get(route('admin.reports.giveaways-pdf'))->assertOk();
});
