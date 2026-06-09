<div>
    <div class="mb-4 max-w-xs"><select class="field" wire:model.live="status"><option value="">All statuses</option><option>processing</option><option>delivered</option><option>cancelled</option></select></div>
    <div class="overflow-hidden rounded-lg bg-white shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 text-xs uppercase text-gray-500"><tr><th class="p-3">Order</th><th>Customer</th><th>Status</th><th>Payment</th><th>Total</th><th></th></tr></thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="border-t">
                        <td class="p-3 font-bold">{{ $order->order_number }}</td>
                        <td>{{ $order->user?->name }}</td>
                        <td><select class="field max-w-36" wire:change="updateStatus({{ $order->id }}, $event.target.value)"><option @selected($order->status==='processing')>processing</option><option @selected($order->status==='delivered')>delivered</option><option @selected($order->status==='cancelled')>cancelled</option></select></td>
                        <td><select class="field max-w-32" wire:change="updatePaymentStatus({{ $order->id }}, $event.target.value)"><option @selected($order->payment_status==='paid')>paid</option><option @selected($order->payment_status==='pending')>pending</option><option @selected($order->payment_status==='failed')>failed</option></select></td>
                        <td>{{ number_format($order->total_price, 2) }} €</td>
                        <td><a class="font-bold text-red-600" href="{{ route('admin.orders.show', $order) }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $orders->links() }}</div>
</div>
