<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$user->name}}    {{ __('Payment Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <table class="shadow-xs bg-white border-collapse w-full">
                        <thead>
                        <tr>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">S/N</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">Amount Deposited</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">Payment Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $key => $value)
                            <tr class="hover:bg-gray-100 focus:bg-gray-300 active:bg-gray-400"  tabindex="0">
                                <td class="border px-8 py-4">{{$key+1}}</td>
                                <td class="border px-8 py-4 text-center">{{number_format($value->amount_deposited)}} XAF</td>
                                <td class="border px-8 py-4 text-center">{{$value->payment_date}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @if(count($payments) == 0)
                        <h3 class="text-lg font-medium text-gray-900 p-5 text-center my-5">
                            Oooops! No payments have been recorded for this student
                        </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>



</x-app-layout>







