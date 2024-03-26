<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $table = 'invoice_items';

    protected $fillable = [
        'invoice_id',
        'service_id',
        'amount',
        // 'end_date',
    ];

    public static function rules()
    {
        return [
            'service_id' => 'required|exists:services,id',
            'invoice_id' => 'required|exists:invoices,id',
            'amount' => 'numeric|min:0',
        ];
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }

}
