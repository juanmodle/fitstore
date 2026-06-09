<?php

namespace App\Livewire;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponManager extends Component
{
    public ?int $couponId = null;
    public string $code = '';
    public string $description = '';
    public ?float $percentage = null;
    public ?float $fixedAmount = null;
    public ?int $usageLimit = null;
    public bool $isVipOnly = false;
    public string $status = 'active';

    public function save(): void
    {
        $data = $this->validate([
            'code' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string'],
            'percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'fixedAmount' => ['nullable', 'numeric', 'min:0'],
            'usageLimit' => ['nullable', 'integer', 'min:1'],
            'isVipOnly' => ['boolean'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        Coupon::updateOrCreate(['id' => $this->couponId], [
            'code' => strtoupper($data['code']),
            'description' => $data['description'],
            'percentage' => $data['percentage'],
            'fixed_amount' => $data['fixedAmount'],
            'usage_limit' => $data['usageLimit'],
            'is_vip_only' => $data['isVipOnly'],
            'status' => $data['status'],
            'starts_at' => now()->subDay(),
            'ends_at' => now()->addMonth(),
        ]);

        $this->reset(['couponId', 'code', 'description', 'percentage', 'fixedAmount', 'usageLimit', 'isVipOnly']);
        $this->status = 'active';
    }

    public function edit(int $id): void
    {
        $coupon = Coupon::findOrFail($id);
        $this->couponId = $coupon->id;
        $this->code = $coupon->code;
        $this->description = (string) $coupon->description;
        $this->percentage = $coupon->percentage ? (float) $coupon->percentage : null;
        $this->fixedAmount = $coupon->fixed_amount ? (float) $coupon->fixed_amount : null;
        $this->usageLimit = $coupon->usage_limit;
        $this->isVipOnly = (bool) $coupon->is_vip_only;
        $this->status = $coupon->status;
    }

    public function delete(int $id): void
    {
        Coupon::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin-coupon-manager', ['coupons' => Coupon::latest()->get()]);
    }
}
