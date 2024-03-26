<?php

namespace App\Services\Interfaces;
use App\Models\Invoice;

interface IInvoiceService extends IApiServices,IInput
{
    //
    public function calculateAmount(Invoice $invoice);
}
