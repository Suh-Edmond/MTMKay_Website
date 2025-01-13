<div class="max-w-full">
    <section>
        <div class="flex justify-between">
            <header class="flex flex-row ">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Training Slots') }}<br>
                    This sections shows all the training slots available for this program
                </h2>
            </header>

            <div class="flex flex-col">
                <a href="{{route('manage.training.slot.index', ['slug' => $program->slug])}}" class="flex justify-end">
                    <x-secondary-button>{{ __('View slots') }}</x-secondary-button>
                </a>
                @if(count($program->trainingSlots) == 0)
                    <small class="text-yellow-500">Training slots have not been created for this program</small>
                @endif
            </div>
        </div>
    </section>
</div>
<script>

</script>

