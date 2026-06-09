<?php

namespace Database\Factories;

use App\Models\EmailLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EmailLog>
 */
class EmailLogFactory extends Factory
{
    protected $model = EmailLog::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'email_to' => fake()->safeEmail(),
            'subject' => fake()->sentence(3),
            'status' => 'logged',
            'sent_at' => now(),
            'error_message' => null,
        ];
    }
}
