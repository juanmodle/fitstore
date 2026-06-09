<?php

use Database\Seeders\DatabaseSeeder;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

test('PublicPagesTest.php 01', function () {
    $this->get(route('home'))->assertOk()->assertSee('Tienda Fit');
    $this->get(route('catalog.index'))->assertOk()->assertSee('Catalogo de productos');
    $this->get(route('blog.index'))->assertOk()->assertSee('Blog');
    $this->get(route('vip.info'))->assertOk()->assertSee('Beneficios VIP');
    $this->get(route('contact.create'))->assertOk()->assertSee('Contact');
});

test('PublicPagesTest.php 02', function () {
    $this->post(route('language.change', 'es'))->assertRedirect();
    $this->assertSame('es', session('locale'));
});
