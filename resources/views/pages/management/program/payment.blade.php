@section('title', "MTMKay-Payment Transaction")
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <a href="{{route('manage-students')}}" >
                <button id="goBack" class="text-blue-800 text-xl">
                    <span><i class="fa fa-arrow-left px-5"></i></span>
                </button>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$user->name}}    {{ __('Payment Transactions') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <div class="flex justify-between">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight p-4">
                            Total: {{number_format($total)}} XAF
                        </h2>
                        @if($enrollment->has_completed_payment)
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight p-4 text-green-700">
                                Status: {{__('COMPLETED')}}
                            </h2>
                        @else
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight p-4 text-yellow-600">
                                Status: {{__('IN COMPLETED')}}
                            </h2>
                        @endif
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight p-4">
                            Balance: {{number_format($balance)}} XAF
                        </h2>
                    </div>

                    <table class="shadow-xs bg-white border-collapse w-full">
                        <thead>
                        <tr>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">S/N</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">Amount Deposited</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">Payment Date</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">Transaction Id</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $key => $value)
                            <tr class="hover:bg-gray-100 focus:bg-gray-300 active:bg-gray-400"  tabindex="0">
                                <td class="border px-8 py-4 text-center">{{$key+1}}</td>
                                <td class="border px-8 py-4 text-center">{{number_format($value->amount_deposited)}} XAF</td>
                                <td class="border px-8 py-4 text-center">{{$value->payment_date}}</td>
                                <td class="border px-8 py-4 text-center">{{$value->setTransactionId($value)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @if(count($payments) == 0)
                        <h3 class="text-lg font-medium text-gray-900 p-5 text-center my-5">
                            Oops! No payments have been recorded for this student
                        </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
     $('#goBack').on('click', function (e){
        history.back();
    })
</script>








