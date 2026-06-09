<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([['Credit Card', 'credit_card'], ['Bank Transfer', 'bank_transfer']] as [$name, $code]) {
            PaymentMethod::updateOrCreate(['code' => $code], ['name' => $name, 'is_active' => true]);
        }
    }
}
