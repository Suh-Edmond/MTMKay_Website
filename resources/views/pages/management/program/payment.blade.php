@section('title', "MTMKay-Payment Transaction")
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <div class="flex flex-row">
                <button id="goBack" class="text-blue-800 text-xl">
                    <span><i class="fa fa-arrow-left px-5"></i></span>
                </button>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Payment Transactions') }}
                </h2>
                @if (session('status'))
                    <x-auth-session-status :status="session('status')"
                                           x-data="{ show: true }"
                                           x-show="show"
                                           x-init="setTimeout(() => show = false, 2000)" class="ml-4 pt-2">
                    </x-auth-session-status>
                @endif
            </div>

            <x-primary-button x-data="make-payment-modal" x-on:click.prevent="$dispatch('open-modal', 'make-payment-modal')">{{ __('Add Payment') }}</x-primary-button>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col flex-wrap">
                            <h2 class="font-semibold text-md text-gray-800 leading-tight py-2 px-4">
                                Name: {{$user->name}}
                            </h2>
                            <h2 class="font-semibold text-md text-gray-800 leading-tight py-2 px-4">
                                Email: {{$user->email}}
                            </h2>
                            <h2 class="font-semibold text-md text-gray-800 leading-tight py-2 px-4">
                                Telephone: {{$user->telephone}}
                            </h2>
                            <h2 class="font-semibold text-md text-gray-800 leading-tight py-2 px-4">
                                Registration ID: {{substr(str_replace('-', '', $user->slug), 0, 10)}}
                            </h2>
                        </div>
                        <div class="lex flex-col flex-wrap">
                            <h2 class="font-semibold text-md text-gray-800 leading-tight py-2 px-4 ">
                                Program: {{$enrollment->trainingSlot->program->title}}
                            </h2>
                            <h2 class="font-semibold text-md text-gray-800 leading-tight py-2 px-4">
                                Total: {{number_format($total)}} XAF
                            </h2>
                            <h2 class="font-semibold text-md text-gray-800 leading-tight py-2 px-4">
                                Balance: {{number_format($balance)}} XAF
                            </h2>
                            @if($enrollment->has_completed_payment)
                                <h2 class="font-semibold text-md leading-tight text-green-800 py-2 px-4">
                                    Status: {{__('COMPLETED')}}
                                </h2>
                            @else
                                <h2 class="font-semibold text-md  leading-tight  text-yellow-600 py-2 px-4">
                                    Status: {{__('IN COMPLETED')}}
                                </h2>
                            @endif
                        </div>
                    </div>
                    <table class="shadow-xs bg-white border-collapse w-full">
                        <thead>
                        <tr>
                            <th class="bg-blue-800 text-white border text-center px-4 py-2">S/N</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-2">Amount Deposited</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-2">Payment Date</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-2">Transaction Id</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $key => $value)
                            <tr class="hover:bg-gray-100 focus:bg-gray-300 active:bg-gray-400"  tabindex="0">
                                <td class="border px-8 py-4 text-center">{{$key+1}}</td>
                                <td class="border px-8 py-4 text-center">{{number_format($value->amount_deposited)}} XAF</td>
                                <td class="border px-8 py-4 text-center">{{\Carbon\Carbon::parse($value->created_at)->format('D, d M Y')}}</td>
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

    @include('pages.management.trainee.payment.add-payment-model')

</x-app-layout>

<script>
     $('#goBack').on('click', function (e){
        history.back();
    })
</script>








