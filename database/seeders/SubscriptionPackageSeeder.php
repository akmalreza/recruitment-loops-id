<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubscriptionPackage;

class SubscriptionPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataCollection = [
            [
                'name' => '1 Bulan',
                'duration' => 1
            ],
            [
                'name' => '3 Bulan',
                'duration' => 3
            ],
            [
                'name' => '6 Bulan',
                'duration' => 6
            ]
        ];

        // Insert all collection data to "subscription_packages" table
        foreach ($dataCollection as $data) {
            SubscriptionPackage::updateOrInsert(
                [
                    'name' => $data['name'],
                ],
                [
                    'duration' => $data['duration'],
                    'created_at' => now()
                ]
            );
        }
    }
}
