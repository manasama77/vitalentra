# Laravel Multilanguage Implementation

Implementasi multilanguage untuk website Vitalentra dengan bahasa Indonesia (default) dan English.

## Fitur Yang Tersedia

- ✅ **Auto-detection**: Deteksi bahasa berdasarkan session, URL parameter, atau browser header
- ✅ **Language Switching**: Tombol untuk mengubah bahasa secara real-time
- ✅ **Helper Functions**: Function helper untuk mempermudah penggunaan
- ✅ **Blade Directives**: Custom directive untuk template
- ✅ **Session Persistence**: Bahasa tersimpan di session user

## Struktur Folder

```
lang/
├── id/                    # Bahasa Indonesia
│   ├── about.php
│   ├── team.php
│   ├── contact.php
│   └── ...
└── en/                    # English
    ├── about.php
    ├── team.php
    ├── contact.php
    └── ...
```

## Cara Penggunaan

### 1. Menggunakan Translation di Blade

```blade
<!-- Basic translation -->
{{ __("team.title") }}

<!-- Translation dengan parameter -->
{{ __("messages.welcome", ["name" => "John"]) }}

<!-- Fallback jika key tidak ditemukan -->
{{ __("messages.not_found", [], "Default text") }}
```

### 2. Helper Functions

```blade
<!-- Get current locale -->
{{ current_locale() }} <!-- Output: id atau en -->

<!-- Check current locale -->
@if (is_locale("id"))
				<p>Bahasa Indonesia aktif</p>
@endif

<!-- Get locale display name -->
{{ locale_name() }} <!-- Output: Bahasa atau English -->
{{ locale_name("en") }} <!-- Output: English -->

<!-- Get locale flag class -->
{{ locale_flag() }} <!-- Output: fi-id atau fi-us -->
```

### 3. Custom Blade Directives

```blade
<!-- Current locale -->
Current language: @locale

<!-- Conditional locale -->
@isLocale("id")
				<p>Konten untuk Bahasa Indonesia</p>
@endisLocale

@isLocale("en")
				<p>Content for English</p>
@endisLocale
```

### 4. Language Switching

```blade
<!-- Manual links -->
<a href="{{ route("language.switch", "id") }}">Bahasa Indonesia</a>
<a href="{{ route("language.switch", "en") }}">English</a>

<!-- Using component -->

<x-landing.language />
```

### 5. Menggunakan di Controller

```php
use Illuminate\Support\Facades\App;

class YourController extends Controller
{
    public function index()
    {
        // Get current locale
        $locale = App::getLocale();

        // Check locale
        if (App::isLocale('id')) {
            // Do something for Indonesian
        }

        // Set temporary locale
        App::setLocale('en');
        $englishTitle = __('team.title');
        App::setLocale($locale); // Restore

        return view('your.view', compact('englishTitle'));
    }
}
```

## URL Parameters

Anda bisa mengubah bahasa dengan menambahkan parameter `lang` di URL:

```
https://vitalentra.test/?lang=en
https://vitalentra.test/news?lang=id
```

## Middleware

Middleware `SetLocale` secara otomatis:

1. **URL Parameter**: Cek parameter `?lang=` di URL
2. **Session**: Cek session yang tersimpan
3. **Browser Header**: Cek `Accept-Language` header
4. **Default**: Gunakan konfigurasi default (`id`)

## Menambah Bahasa Baru

1. **Buat folder bahasa baru** di `lang/`:

    ```
    lang/fr/  # Untuk bahasa Prancis
    ```

2. **Update helper function** di `app/Helpers/LocaleHelper.php`:

    ```php
    function supported_locales(): array
    {
        return [
            'id' => [...],
            'en' => [...],
            'fr' => [
                'name' => 'Français',
                'flag' => 'fi-fr',
                'display' => 'Français'
            ]
        ];
    }
    ```

3. **Update middleware** di `app/Http/Middleware/SetLocale.php`:
    ```php
    $supportedLocales = ['id', 'en', 'fr'];
    ```

## Testing

```bash
# Test melalui Tinker
php artisan tinker

# Set locale dan test translation
App::setLocale('en');
echo __('team.title');  # Output: Team

App::setLocale('id');
echo __('team.title');  # Output: Tim
```

## Best Practices

1. **Gunakan key yang descriptive**: `team.title` bukan `t1`
2. **Konsisten dengan namespace**: Group translation berdasarkan halaman/fitur
3. **Fallback text**: Selalu sediakan fallback untuk key yang mungkin hilang
4. **Testing**: Test semua bahasa sebelum deploy ke production

## Troubleshooting

### Translation tidak muncul

```bash
# Clear cache
php artisan config:clear
php artisan view:clear
php artisan cache:clear

# Regenerate autoload
composer dump-autoload
```

### Bahasa tidak berubah

- Cek apakah middleware sudah terdaftar di `bootstrap/app.php`
- Pastikan session berfungsi dengan baik
- Cek route untuk language switching sudah benar
