<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class ValidVipSubscription implements ValidationRule
{
    public function __construct(private ?User $user) {}

    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->user) {
            $fail('You must be logged in to create a VIP subscription.');

            return;
        }

        if ($this->user->vipSubscriptions()->active()->exists()) {
            $fail('You already have an active VIP subscription.');
        }
    }
}
