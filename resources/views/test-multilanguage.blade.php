<!DOCTYPE html>
<html lang="{{ current_locale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Test Multilanguage') }} - Vitalentra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .flag {
            font-size: 2em;
            margin-right: 10px;
        }

        .info-box {
            background: #e8f4fd;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            border-left: 4px solid #2196F3;
        }

        .success {
            background: #e8f5e8;
            border-left-color: #4CAF50;
        }

        .language-switcher {
            text-align: center;
            margin: 20px 0;
        }

        .lang-btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 10px;
            background: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .lang-btn:hover {
            background: #1976D2;
        }

        .lang-btn.active {
            background: #4CAF50;
        }

        .test-results {
            margin-top: 30px;
        }

        .test-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .status {
            font-weight: bold;
        }

        .success-status {
            color: #4CAF50;
        }

        .code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: monospace;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>
                <span class="{{ locale_flag(current_locale()) }}"></span>
                🌍 Test Multilanguage System
            </h1>
            <p>Testing multilanguage functionality for Vitalentra website</p>
        </div>

        <div class="info-box success">
            <h3>✅ Current Language Settings</h3>
            <div class="test-results">
                <div class="test-item">
                    <span>Current Locale:</span>
                    <span class="status success-status">{{ current_locale() }}</span>
                </div>
                <div class="test-item">
                    <span>Language Name:</span>
                    <span class="status success-status">{{ locale_name(current_locale()) }}</span>
                </div>
                <div class="test-item">
                    <span>Flag Class:</span>
                    <span class="code">{{ locale_flag(current_locale()) }}</span>
                </div>
                <div class="test-item">
                    <span>Is Indonesian:</span>
                    <span class="status {{ is_locale('id') ? 'success-status' : '' }}">
                        {{ is_locale('id') ? '✅ Yes' : '❌ No' }}
                    </span>
                </div>
                <div class="test-item">
                    <span>Is English:</span>
                    <span class="status {{ is_locale('en') ? 'success-status' : '' }}">
                        {{ is_locale('en') ? '✅ Yes' : '❌ No' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="language-switcher">
            <h3>🔄 Switch Language</h3>
            <a href="{{ route('language.switch', 'id') }}" class="lang-btn {{ is_locale('id') ? 'active' : '' }}">
                <span class="fi-id"></span> Indonesia
            </a>
            <a href="{{ route('language.switch', 'en') }}" class="lang-btn {{ is_locale('en') ? 'active' : '' }}">
                <span class="fi-us"></span> English
            </a>
        </div>

        <div class="info-box">
            <h3>🧪 Helper Functions Test</h3>
            <div class="test-results">
                <div class="test-item">
                    <span><code>current_locale()</code>:</span>
                    <span class="code">{{ current_locale() }}</span>
                </div>
                <div class="test-item">
                    <span><code>locale_name('id')</code>:</span>
                    <span class="code">{{ locale_name('id') }}</span>
                </div>
                <div class="test-item">
                    <span><code>locale_name('en')</code>:</span>
                    <span class="code">{{ locale_name('en') }}</span>
                </div>
                <div class="test-item">
                    <span><code>locale_flag('id')</code>:</span>
                    <span class="code">{{ locale_flag('id') }}</span>
                </div>
                <div class="test-item">
                    <span><code>locale_flag('en')</code>:</span>
                    <span class="code">{{ locale_flag('en') }}</span>
                </div>
                <div class="test-item">
                    <span><code>is_locale('{{ current_locale() }}')</code>:</span>
                    <span class="code">{{ is_locale(current_locale()) ? 'true' : 'false' }}</span>
                </div>
            </div>
        </div>

        <div class="info-box">
            <h3>📊 Supported Locales</h3>
            <div class="test-results">
                @foreach (supported_locales() as $code => $info)
                    <div class="test-item">
                        <span>
                            <span class="{{ $info['flag'] }}"></span>
                            {{ $code }} ({{ $info['name'] }})
                        </span>
                        <span class="code">{{ $info['display'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        @if (current_locale() === 'id')
            <div class="info-box">
                <h3>🇮🇩 Konten Bahasa Indonesia</h3>
                <p>Ini adalah konten yang ditampilkan ketika bahasa aktif adalah <strong>Bahasa Indonesia</strong>.</p>
                <p>Semua helper function bekerja dengan sempurna untuk mendukung sistem multilanguage.</p>
            </div>
        @endif

        @if (current_locale() === 'en')
            <div class="info-box">
                <h3>🇺🇸 English Content</h3>
                <p>This content is displayed when the active language is <strong>English</strong>.</p>
                <p>All helper functions work perfectly to support the multilanguage system.</p>
            </div>
        @endif

        <div class="info-box">
            <h3>🔗 Navigation</h3>
            <p>
                <a href="{{ route('home') }}" style="color: #2196F3;">← Back to Homepage</a> |
                <a href="{{ route('language.switch', current_locale() === 'id' ? 'en' : 'id') }}"
                   style="color: #2196F3;">
                    Switch to {{ current_locale() === 'id' ? 'English' : 'Indonesia' }}
                </a>
            </p>
        </div>

        <div style="text-align: center; margin-top: 30px; color: #666; font-size: 0.9em;">
            <p>✅ Multilanguage System Successfully Implemented</p>
            <p>Laravel 12.x • Vitalentra • {{ date('Y') }}</p>
        </div>
    </div>

    <!-- Include Flag Icons CSS if needed -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons@6.11.0/css/flag-icons.min.css">
</body>

</html>
