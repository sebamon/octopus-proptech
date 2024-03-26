<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Services\Interfaces\IServiceService;
use Exception;
use Illuminate\Http\Request;
use App\Services\Interfaces\IInvoiceService;
use \Illuminate\Contracts\Validation\Validator;
class InvoiceController extends ApiController
{
    private IInvoiceService $invoicesServices;
    private IServiceService $servicesServices;

    public function __construct(IInvoiceService $invoicesServices, IServiceService $servicesServices){
        $this->invoicesServices = $invoicesServices;
        $this->servicesServices = $servicesServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = $this->invoicesServices->index([]);
        return view('home',compact('invoices')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // echo 1;die;
        $services = $this->servicesServices->index([]);
        // print_r($services);die;
        return view('invoice',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $params= $request->all();
        $validator = $this->invoicesServices->create($params);
        
        if($validator  instanceof Validator){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return redirect()->route('invoice.create')->with('message','Success: A new invoice was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
           $invoice = $this->invoicesServices->find($id);
           $totalAmount = $this->invoicesServices->calculateAmount($invoice);
           $services = $this->servicesServices->index([]);
           return view('invoice',compact('invoice','totalAmount','services'));

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
