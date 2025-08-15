<div class="dropdown wrapper-language relative inline-flex">
    <button id="language-change-btn"
            type="button"
            class="dropdown-toggle text-primary-color inline-flex items-center gap-1 text-lg/none"
            aria-haspopup="menu"
            aria-expanded="false"
            aria-label="Dropdown">
        <span class="fi {{ locale_flag() }} mr-1 rounded-sm"></span> {{ locale_name() }}
        <i class="fas fa-chevron-down dropdown-open:rotate-180 -mt-1 size-4 transition-transform duration-200"></i>
    </button>
    <ul class="dropdown-menu dropdown-open:opacity-100 min-w-auto hidden"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="dropdown-default">
        @foreach (supported_locales() as $code => $locale)
            <li>
                <a class="dropdown-item {{ is_locale($code) ? 'active' : '' }} flex items-center"
                   href="{{ route('language.switch', $code) }}">
                    <span class="fi {{ $locale['flag'] }} mr-3 rounded-sm"></span>
                    {{ $locale['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

