<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\payment_type;
use Spatie\Multitenancy\Models\Tenant;

class payment_typesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  $type=[
        ["description"=>"Banco Agua"],
        ["description"=>"Dinheiro"],
        ["description"=>"Emola"],
        ["description"=>"Mpesa"],
        ["description"=>"Banco Coontrato"],
    ];
    foreach ($type as $key ) {
        $payment_type =  payment_type::create([
            'description' => $key["description"],
        ]);
    } //
    }
}
