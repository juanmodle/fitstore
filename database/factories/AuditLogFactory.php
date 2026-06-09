<?php

namespace Database\Factories;

use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AuditLog>
 */
class AuditLogFactory extends Factory
{
    protected $model = AuditLog::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'action' => 'created',
            'table_name' => 'products',
            'record_id' => 1,
            'old_values' => null,
            'new_values' => ['ejemplo' => true],
            'created_at' => now(),
        ];
    }
}
