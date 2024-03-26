@extends('layout.app')

@section('content')
    <section>
    <h3 class="text-xl p-4 mt-10">Invoices List</h3>
   
    <div>
        <a class="bg-blue-600  p-2 w-10 h-10  rounded-xl text-white mb-3" href="{{route('invoice.create')}}">Create a new Invoice</a>
    </div>
    <div class="relative overflow-x-auto mt-3">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nro
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Customer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{$invoice->id}}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$invoice->customer}}
                    </th>
                    <td class="px-6 py-4">
                        {{$invoice->number}}
                    </td>
                    <td class="px-6 py-4">
                        {{$invoice->total_amount}}
                    </td>
                    <td class="px-6 py-4">
                        {{$invoice->start_date}} - {{$invoice->end_date}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('invoice.show', ['id' => $invoice->id]) }}"><i class="fa-solid fa-eye hover:text-blue-600"></i></a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="bg-blue-100 text-3xl">
            {{ $invoices->links() }}
        </div>
    </div>

</section>
@endsection


