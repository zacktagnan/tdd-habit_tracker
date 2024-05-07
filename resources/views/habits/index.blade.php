<x-app-layout>
    <div id="app" class="flex flex-col justify-center min-h-screen bg-gray-200">
        <div class="flex flex-col bg-white pt-10 pb-8 sm:max-w-lg sm:min-w-[490px] sm:mx-auto px-6 sm:px-8 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-semibold">{{ __('habits/index.general_section_label') }}</h1>
                <button type="button" class="text-white bg-primary-600 hover:bg-primary-400 transition-all duration-200 px-3.5 py-2 rounded-md">{{ __('habits/index.habit_new') }}</button>
            </div>

            <habit-list times_text="{{ __('habits/index.times') }}" />
        </div>
    </div>
</x-app-layout>
