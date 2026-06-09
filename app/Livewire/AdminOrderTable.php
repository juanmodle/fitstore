<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrderTable extends Component
{
    use WithPagination;

    public string $status = '';

    public function updateStatus(int $orderId, string $status): void
    {
        Order::findOrFail($orderId)->update(['status' => $status]);
    }

    public function updatePaymentStatus(int $orderId, string $status): void
    {
        Order::findOrFail($orderId)->update(['payment_status' => $status]);
    }

    public function render()
    {
        return view('livewire.admin-order-table', [
            'orders' => Order::with('user')
                ->when($this->status, fn ($query) => $query->where('status', $this->status))
                ->latest()
                ->paginate(12),
        ]);
    }
}
