<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\InvoiceItem;


class InvoiceItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = InvoiceItem::class;
    

    public function definition(): array
    {   
        $invoiceId = Invoice::inRandomOrder()->first()->id;
        $serviceId = Service::inRandomOrder()->first()->id;

        return [
            'invoice_id' => $invoiceId, 
            'service_id' => $serviceId,
            'amount' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
