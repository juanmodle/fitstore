<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'administrador@gmail.com')->first();
        $documents = [
            ['Invoice Example', 'invoice', 'invoices/invoice-example.pdf'],
            ['Whey Protein Guide', 'product_guide', 'guides/whey-protein-guide.pdf'],
            ['VIP Benefits Report', 'vip_report', 'reports/vip-benefits.pdf'],
            ['Privacy Policy', 'legal', 'legal/privacy-policy.pdf'],
            ['Terms and Conditions', 'legal', 'legal/terms-and-conditions.pdf'],
        ];

        foreach ($documents as [$title, $type, $path]) {
            Document::updateOrCreate(
                ['title' => $title],
                [
                    'user_id' => $admin?->id,
                    'description' => 'Seeded document for the FITSTORE media area.',
                    'document_type' => $type,
                    'file_path' => $path,
                ]
            );
        }
    }
}
