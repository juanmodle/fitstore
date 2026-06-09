<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactReceivedMail;
use App\Models\Category;
use App\Models\Discount;
use App\Models\EmailLog;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'featuredProducts' => Product::with('mainImage', 'category.translations', 'translations')->popularForHome()->where('is_featured', true)->take(8)->get(),
            'bestSellers' => Product::with('mainImage', 'category.translations', 'translations')->popularForHome()->take(6)->get(),
            'categories' => Category::with('translations')->where('status', 'active')->take(7)->get(),
            'posts' => Post::with('category', 'translations')->published()->latest('published_at')->take(3)->get(),
            'offers' => Discount::where('status', 'active')->latest()->take(3)->get(),
        ]);
    }

    public function vip()
    {
        return view('vip.show');
    }

    public function contact()
    {
        return view('contact.show');
    }

    public function sendContact(ContactRequest $request)
    {
        $data = $request->validated();

        EmailLog::create([
            'email_to' => config('mail.from.address'),
            'subject' => 'Contact form from ' . $data['name'],
            'status' => 'logged',
            'sent_at' => now(),
            'error_message' => $data['email'] . ': ' . $data['message'],
        ]);

        Mail::to(config('mail.from.address'))->send(new ContactReceivedMail($data));

        return back()->with('success', 'Message received. We will answer soon.');
    }
}
