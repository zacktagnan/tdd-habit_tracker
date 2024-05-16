<x-app-layout>
    @php
        // dd($menu);
    @endphp
    <div id="app" class="flex flex-col justify-center min-h-screen bg-gray-200 py-11">
        <div class="flex flex-col bg-yellow-100 pt-10 pb-8 sm:max-w-lg sm:min-w-[490px] sm:mx-auto px-6 sm:px-8 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl">
            @include('partials/locale-switcher')

            <p class="text-center">en Blade: {{ __('validation.required', ['attribute' => 'SALUDO']) }}</p>

            <div class="flex items-center justify-between">
                {{-- <h1 class="text-xl font-semibold">{{ __('habits/index.general_section_label_with_name', ['name' => 'PJCM']) }}</h1> --}}
                <h1 class="text-xl font-semibold">{{ __('habits/index.general_section_label') }}</h1>

                {{-- <habit-new-button /> --}}
                <habit-new-button title="{{ __('habits/index.button.new') }}" />
            </div>

            {{-- <habit-list times_per_day_text="{{ __('habits/index.times_per_day') }}" /> --}}
            <habit-list />
        </div>

        <main-dialog />
        {{-- <confirm-dialog />
        <habit-form-dialog /> --}}
    </div>
</x-app-layout>
