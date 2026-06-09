<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerProfile;
use App\Models\Giveaway;
use App\Models\Order;
use App\Models\Product;
use App\Models\VipSubscription;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\Response;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }

    public function salesPdf()
    {
        $pdf = Pdf::loadView('pdf.sales-report', [
            'orders' => Order::with('user')->latest()->take(20)->get(),
            'totalSales' => Order::paidBetween()->sum('total_price'),
            'vipCustomers' => CustomerProfile::where('is_vip', true)->count(),
            'lowStockProducts' => Product::where('stock', '<=', 10)->orderBy('stock')->take(8)->get(),
        ]);

        return $this->pdfResponse($pdf, 'fitstore-sales-report.pdf');
    }

    public function productsPdf()
    {
        $pdf = Pdf::loadView('pdf.products-report', [
            'products' => Product::with('category', 'brand')->popularForHome()->take(50)->get(),
        ]);

        return $this->pdfResponse($pdf, 'fitstore-products-report.pdf');
    }

    public function vipPdf()
    {
        $pdf = Pdf::loadView('pdf.vip-report', [
            'subscriptions' => VipSubscription::with('user', 'payments')->latest()->get(),
        ]);

        return $this->pdfResponse($pdf, 'fitstore-vip-report.pdf');
    }

    public function giveawaysPdf()
    {
        $pdf = Pdf::loadView('pdf.giveaways-report', [
            'giveaways' => Giveaway::with('winner')->withCount('entries')->latest()->get(),
        ]);

        return $this->pdfResponse($pdf, 'fitstore-giveaways-report.pdf');
    }

    private function pdfResponse($pdf, string $filename): Response
    {
        $output = $pdf->output();
        $disposition = request()->boolean('download') ? 'attachment' : 'inline';

        return response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => $disposition . '; filename="' . $filename . '"',
            'Content-Length' => strlen($output),
            'Cache-Control' => 'private, max-age=0, must-revalidate',
            'Pragma' => 'public',
        ]);
    }
}
