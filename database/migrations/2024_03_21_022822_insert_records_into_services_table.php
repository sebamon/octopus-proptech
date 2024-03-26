<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    const SERVICES = [
        [
            'name' => 'BackOffice service',
            'cost' => 7.00,
            'measure' => 'monthly'
        ],
        [
            'name' => 'Storage service',
            'cost' => 0.03,
            'measure' => 'GB'
        ],
        [
            'name' => 'Proxy service',
            'cost' => 0.03,
            'measure' => 'minute'
        ],
        [
            'name' => 'Speech translation service',
            'cost' => 0.00003,
            'measure' => 'letter'
        ],
    ];
    
    public function up(): void
    {
        DB::table('services')->insert(self::SERVICES);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
