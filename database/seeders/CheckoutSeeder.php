<?php

namespace Database\Seeders;

use App\Models\Checkin;
use App\Models\Checkout;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CheckoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $checkin = Checkin::find(5);

        if ($checkin && !$checkin->checkout) {
            Checkout::create([
                'checkin_id' => $checkin->id,
                'waktu_keluar' => now(),
                'catatan' => 'Dummy checkout',
            ]);

            $checkin->update([
                'id_status' => 4 // Check-out
            ]);
        }

    }
}
