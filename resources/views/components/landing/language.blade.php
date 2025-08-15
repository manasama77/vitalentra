<div class="dropdown wrapper-language relative inline-flex">
    <button id="language-change-btn"
            type="button"
            class="dropdown-toggle text-primary-color inline-flex items-center gap-1 text-lg/none"
            aria-haspopup="menu"
            aria-expanded="false"
            aria-label="Dropdown">
        <span class="fi fi-id mr-1 rounded-sm"></span> Bahasa
        {{-- <span class="icon-[tabler--chevron-down] dropdown-open:rotate-180 size-4"></span> --}}
        <i class="fas fa-chevron-down dropdown-open:rotate-180 -mt-1 size-4 transition-transform duration-200"></i>
    </button>
    <ul class="dropdown-menu dropdown-open:opacity-100 min-w-auto hidden"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="dropdown-default">
        <li>
            <a class="dropdown-item active flex items-center" href="#">
                <span class="fi fi-id mr-3 rounded-sm"></span>
                Indonesia
            </a>
        </li>
        <li>
            <a class="dropdown-item flex items-center" href="#">
                <span class="fi fi-us mr-3 rounded-sm"></span>
                English
            </a>
        </li>
    </ul>
</div>
