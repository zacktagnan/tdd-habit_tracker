            <div class="flex items-center justify-center mb-5 uppercase">
                @foreach ($languageMenu as $k_language => $languageMenuItem)
                    @if (! $loop->first)
                        <span class="mx-1">|</span>
                    @endif

                    @php
                    // dd($languageMenuItem['text'])
                    @endphp

                    @if($k_language === $current_locale)
                        <span title="{{ __('Current language:') }} {{ __($languageMenuItem['language']) }}" class="px-1 py-0 text-white rounded-lg cursor-default bg-primary-400">
                            {{ $k_language }}
                        </span>
                    @else
                        <a href="{{ route('switch.locale', ['locale' => $k_language]) }}" title="{{ __('Change language to:') }} {{ __($languageMenuItem['language']) }}" class="px-1 py-0 text-white rounded-lg bg-primary-600 hover:bg-primary-400">
                            {{ $k_language }}
                        </a>
                    @endif
                @endforeach
            </div>
