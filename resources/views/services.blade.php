@extends('layout.app')

@section('content')
<section class="">
    <h3 Invoices List</h3>
    <h3 class="text-xl p-4 mt-10">Services List</h3>
    <div class="relative overflow-x-auto">
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
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $identity = 1;
                @endphp
                @foreach($services as $service)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td>
                        {{$identity}}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$service->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$service->cost}}
                    </td>
                    <td class="px-6 py-4">
                        {{$service->measure}}
                    </td>

                    @php
                        $identity++;
                    @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <button type="button" onclick="window.location='{{ route('invoice.index') }}'" id="back" class="w-20 flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-slate-400 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
        Back
    </button>
        @endsection