<x-app-layout>
    <div id="app" class="flex flex-col justify-center min-h-screen bg-gray-200">
        <div class="flex flex-col bg-white pt-10 pb-8 sm:max-w-lg sm:min-w-[490px] sm:mx-auto px-6 sm:px-8 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-semibold">{{ __('habits/index.general_section_label') }}</h1>

                <habit-new-button />
            </div>

            <habit-list times_per_day_text="{{ __('habits/index.times_per_day') }}" />
        </div>

        <habit-dialog />
    </div>
</x-app-layout>
