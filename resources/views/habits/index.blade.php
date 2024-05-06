<x-app-layout>
    <div id="app" class="flex flex-col bg-gray-200 min-h-screen justify-center">
        <div class="flex flex-col bg-white pt-10 pb-8 sm:max-w-lg sm:min-w-[490px] sm:mx-auto px-6 sm:px-8 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold">{{ __('habits/index.general_section_label') }}</h1>
                <button type="button" class="text-white bg-primary-600 hover:bg-primary-400 transition-all duration-200 px-3.5 py-2 rounded-md">{{ __('habits/index.habit_new') }}</button>
            </div>

            <div class="divide-y divide-gray-300/5">
                <div class="text-base leading-7 text-gray-900">
                    <div class="flex items-center py-2.5">
                        <habit-info name="Beber agua" executions_count="1" times_per_day="3" times_text="{{ __('habits/index.times') }}"></habit-info>

                        <execute-button></execute-button>

                        <progress-bar percent="30"></progress-bar>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
