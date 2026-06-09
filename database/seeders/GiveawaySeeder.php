<?php

namespace Database\Seeders;

use App\Models\Giveaway;
use App\Models\User;
use Illuminate\Database\Seeder;

class GiveawaySeeder extends Seeder
{
    public function run(): void
    {
        $vip = User::where('email', 'vip@gmail.com')->first();

        $giveaways = [
            ['Sorteo mensual de proteina', 'Pack de proteina con shaker', now()->subDays(4), now()->addDays(20), 'active', null],
            ['Sorteo mochila VIP', 'Mochila premium con accesorios', now()->subDays(2), now()->addDays(18), 'active', null],
            ['Sorteo pack creatina', 'Pack de creatina para un mes', now()->subDay(), now()->addDays(15), 'active', null],
            ['Sorteo cerrado de barritas', 'Caja de barritas proteicas', now()->subDays(35), now()->subDays(5), 'finished', $vip?->id],
            ['Sorteo cerrado de guantes', 'Guantes de entrenamiento', now()->subDays(25), now()->subDays(2), 'finished', $vip?->id],
            ['Sorteo en curso de ropa', 'Camiseta y pantalones de entrenamiento', now()->subDays(1), now()->addDays(10), 'in_progress', null],
            ['Sorteo en curso de accesorios', 'Cinturon y correas de muneca', now()->subDays(1), now()->addDays(12), 'in_progress', null],
        ];

        foreach ($giveaways as [$title, $prize, $startDate, $endDate, $status, $winnerId]) {
            Giveaway::updateOrCreate(
                ['title' => $title],
                [
                    'description' => 'Los clientes VIP pueden participar en este sorteo de ejemplo.',
                    'prize' => $prize,
                    'start_date' => $startDate->toDateString(),
                    'end_date' => $endDate->toDateString(),
                    'status' => $status,
                    'winner_user_id' => $winnerId,
                ]
            );
        }
    }
}
