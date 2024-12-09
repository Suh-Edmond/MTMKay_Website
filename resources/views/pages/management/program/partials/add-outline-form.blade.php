<form method="post" action="{{ route('program.create.outline', ['slug' => $program->slug ?? '']) }}" class="mt-6 space-y-6 ">
    @csrf
    <div id="add-outline-form" style="display: none" >
        <div class="basis-1/4 flex-auto">
            <x-input-label for="period" :value="__('Period')" />
            <select id="period" name="period"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose period</option>
                @foreach($quarters ?? [] as $key => $quarter)
                    <option value="{{$quarter}}">{{$quarter}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <x-input-label for="topic" value="Topic" />
            <x-text-input id="topic" name="topic" type="text" class="mt-1 block w-full"   :value="old('topic')" required   autocomplete="topic" />
            <x-input-error class="mt-2" :messages="$errors->get('topic')" />
        </div>

        <div class="flex items-center gap-4 mb-3 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </div>
</form>
