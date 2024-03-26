<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoices';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'customer',
        'number',
        'total_amount',
        'start_date',
        'end_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        // 'remember_token',
    ];

    public static function rules()
    {
        return [
            'customer' => 'required|string|max:255',
            'number' => 'required|string|min:1|max:10',
        ];
    }


    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
