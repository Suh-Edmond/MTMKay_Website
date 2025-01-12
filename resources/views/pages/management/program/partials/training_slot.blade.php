<div class="max-w-full">
    <section>
        <div class="flex justify-between">
            <header class="flex flex-row ">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Training Slots') }}<br>
                    This sections shows all the training slots available for this program
                </h2>
            </header>

            <a href="{{route('manage.training.slot.index', ['slug' => $program->slug])}}">
                <x-secondary-button>{{ __('View slots') }}</x-secondary-button>
            </a>
        </div>
    </section>
</div>
<script>

</script>

