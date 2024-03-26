@extends('layout.app')

@section('content')
@php
    $menu = !isset($invoice) ? 'Add a new' : 'Edit';
    // $totalItems = $invoice->invoiceItems->count() ?? 0;
    // $totalItems = 0;
    // $edit = isset($invoice) ? true : false;
@endphp

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-3xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{$menu}} invoice</h2>
        
        @if($errors->any())
        {{$errors}}
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Error</span>
            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('message'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">{{session('message')}}</span>
          </div>
        @endif
        <form action="{{route('invoice.store')}}" method="POST">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Name</label>
                    <input type="text" name="customer" id="customer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type customer name" required=""
                    @if(isset($invoice))
                        value="{{ $invoice->customer }}"
                     @endif>
                </div>
                <div class="w-full">
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Invoice Number</label>
                    <input type="number" name="number" id="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type invoice number" required=""
                    @if(isset($invoice))
                        value="{{$invoice->number}}"
                    @endif>
                </div>
                <div class="w-full">
                    <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required=""
                    @if(isset($invoice))
                        value="{{$invoice->start_date}}"
                    @endif>
                </div>
            </div>
            <button type="button" id="select_services" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-slate-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Add Service
            </button>
            <div id="selectContainer" class='mt-5'>
              
            </div>     

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Services
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cost
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Measure
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($invoice))
                        @foreach($invoice->invoiceItems as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$item->service->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$item->service->cost}}
                            </td>
                            <td class="px-6 py-4">
                                {{$item->service->measure}}
                            </td>
                            <td class="px-6 py-4">
                            $ {{$item->amount}}
                            </td>
                            <td class="px-6 py-4">
                                ${{$item->service->cost * $item->amount}}
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="1" class=" font-bold">Total Services:</td>
                        <td class="text-left font-bold">{{isset($totalItems) ? $totalItems : 0 }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right font-bold">Total $:</td>
                        <td class="font-bold">{{ isset($totalAmount) ? $totalAmount : 0 }}</td>
                    </tr>
                </tbody>
                
            </table>
        </div>
        @if(!isset($invoice))
        <button type="button" onclick="window.location='{{ route('invoice.index') }}'" id="back" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-slate-400 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Back
        </button>
        <button type="submit" id="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Create Invoice
        </button>
            
        @endif
    </form>
    </div>
  </section>




<script>
    const selectContainer = document.getElementById('selectContainer');
    const addSelectButton = document.getElementById('select_services');
    let selectCount = 1; // Contador de selects

    // Función para agregar un nuevo select
    function addSelect() {
        const selectWrapper = document.createElement('div'); // Contenedor para el select y el input
        selectWrapper.classList.add('flex', 'items-center', 'gap-4');

        const newSelect = document.createElement('select');
        const newInput = document.createElement('input');
        // selectContainer.classList.add('flex')
        newSelect.name = 'service' + selectCount; // Cambia 'select' por 'service'
        newSelect.classList.add('bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg', 'focus:ring-blue-500', 'focus:border-blue-500', 'block', 'w-full', 'p-2.5', 'dark:bg-gray-700', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-blue-500', 'dark:focus:border-blue-500');
        // Agrega opciones al select (opcional)
        newSelect.innerHTML = `
            <option selected>Choose a service</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        `;
        newInput.type = 'text';
        newInput.name = 'quantity' + selectCount; // Nombre del input
        newInput.placeholder = 'Quantity'; // Placeholder del input
        newInput.classList.add('bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg', 'focus:ring-blue-500', 'focus:border-blue-500', 'block', 'w-full', 'p-2.5', 'dark:bg-gray-700', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-blue-500', 'dark:focus:border-blue-500'); // Clases del input
        selectWrapper.appendChild(newSelect);
        selectWrapper.appendChild(newInput);
        selectContainer.appendChild(selectWrapper);
        selectCount++;
    }

    // Escucha el clic en el botón y agrega un nuevo select
    addSelectButton.addEventListener('click', addSelect);
</script>

@endsection