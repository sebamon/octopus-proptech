<?php

namespace App\Services;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Services\Interfaces\IInvoiceService;
use Illuminate\Support\Facades\Validator;

class InvoiceService implements IInvoiceService
{
    private $modelClass;

    public function __construct(Invoice $modelClass)
    {   
        $this->modelClass = $modelClass;
    }
    function create($data){

        $validator = Validator::make($data,Invoice::rules());
        if ($validator->fails()) {
            return $validator;
        }
        
        $newInvoice = new Invoice($data);

        $newInvoice->save();
        $newId = $newInvoice->id;
        
        $services = [];
        foreach($data as $key => $value){
            if(str_contains($key,'service')){
                $number = substr($key, strlen($key) - 1);
                $services[] = [
                    'service_id' => $value,
                    'amount' => $data["quantity$number"]
                ];
            }
        }

        $totalAmount = 0;
        foreach($services as $service){
            $service['invoice_id'] = $newId;
            $validatorItem = Validator::make($service,InvoiceItem::rules());
            if ($validatorItem->fails()) {
                return $validatorItem;
            }
            $newInvoiceItem = new InvoiceItem($service);
            $totalAmount+= $newInvoiceItem->amount * $newInvoiceItem->service->cost;
            $newInvoiceItem->save();
        }
        $newInvoice->total_amount = $totalAmount;
        $newInvoice->save();
}
public function index($criteria){
    $query = $this->modelClass;
    foreach($criteria as $key => $value){
        if(!is_numeric($value)){
            $query = $query->where($key,'ILIKE','%'.$value.'%');
        }else{
                $query = $query->where($key,$value);
            }
        }
        return $query->paginate(10);

    }
    function update($id, $data){

    }
    function find($id): Model{
        $invoice = $this->modelClass::find($id);
        if(empty($invoice)){
            throw new \Exception('Invoice not found',404);
        }
        // print_r($invoice->invoiceItems);
        return $invoice;
    }
    public function calculateAmount(Invoice $invoice){
        $items = $invoice->invoiceItems;
        $total = 0;
        // $resume = [];
        foreach($items as $item){
            $subTotal= $item->service->cost * $item->amount;
            // $resume[] = [
            //     'service' => $item->service->name,
            //     'amount' => $item->amount,
            //     'subTotal' => $subTotal,
            // ];
            $total+= $subTotal;
        }
        // $resume[] = [
        //     'total' => $total
        // ];
        return $total;
    }
    public function getInputRequired(){
        return $this->modelClass->getFillable();
    }
}
