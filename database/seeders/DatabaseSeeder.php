<?php

namespace Database\Seeders;

use App\Models\Invoice;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(InvoiceSeeder::class);
        $this->call(InvoiceItemSeeder::class);

        $invoices = Invoice::all();
        foreach ($invoices as $invoice) {
            $totalAmount = $invoice->invoiceItems()->sum('amount');
            $invoice->total_amount = $totalAmount;
            $invoice->save();
        }
    
    }
}
