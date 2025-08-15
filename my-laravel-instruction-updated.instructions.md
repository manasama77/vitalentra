````instructions
# GitHub Copilot Custom Instructions for PHP

## applyTo
- "**/*.blade.php"
- "**/*.php"
- "**/*.js"
- "**/*.ts"
- "**/*.css"
- "**/*.scss"
- "**/*.json"

## Style Guidelines
- Don't use php cs-fixer.
- Use Laravel Pint's default preset.
- Use Prettier for frontend files (JS, CSS, Blade and Blade + Script Tag, Laravel + inertia.js + react.js + Livewire).
- Use Laravel Pint for PHP formatting.
- Use Prettier for frontend formatting.
- Supports Laravel Livewire syntax (dynamic attributes like :title, :description, wire:model, etc.).
- Indent with 4 tabs.
- Use double quotes for strings.
- PSR-12 brace style (opening brace on same line).
- Use semicolons at the end of statements.
- When array more than one line, use the following format:
```php
$array = [
    "first" => "value",
    "second" => "value",
];
```
- Use single quotes for strings in JavaScript.
- Use double quotes for strings in CSS.
- Use single quotes for strings in Blade templates and Laravel translation functions (__('text')).
- Use double quotes for strings in Blade templates with script tags.
- Use double quotes for strings in JSON.
- Use single quotes for strings in PHP without interpolation.
- Use double quotes for strings in PHP with interpolation.
- Use template literals for strings in JavaScript.
- For Laravel translations, always use single quotes: __('Translate this') instead of __("Translate this").

## Automatic Setup Requirements
When implementing these guidelines in a Laravel project, create the following files and configurations:

### 1. Package.json Scripts
Add these NPM scripts to package.json:
```json
{
    "scripts": {
        "format": "prettier --write \"resources/**/*.{js,ts,css,scss,json,blade.php}\"",
        "format-all": "npm run format && composer pint",
        "lint": "prettier --check \"resources/**/*.{js,ts,css,scss,json,blade.php}\"",
        "pre-push": "npm run format-all && npm run lint && composer pint-test",
        "quick-check": "npm run lint && composer pint-test"
    }
}
```

### 2. Dependencies
Add these devDependencies to package.json:
```json
{
    "devDependencies": {
        "prettier": "^3.2.5",
        "@shufo/prettier-plugin-blade": "^1.14.13"
    }
}
```

### 3. Composer Scripts
Add these scripts to composer.json:
```json
{
    "scripts": {
        "pint": ["./vendor/bin/pint"],
        "pint-test": ["./vendor/bin/pint --test"]
    }
}
```

### 4. Prettier Configuration (.prettierrc.json)
```json
{
    "printWidth": 80,
    "tabWidth": 4,
    "useTabs": true,
    "semi": true,
    "singleQuote": false,
    "quoteProps": "as-needed",
    "trailingComma": "es5",
    "bracketSpacing": true,
    "bracketSameLine": true,
    "arrowParens": "avoid",
    "endOfLine": "lf",
    "overrides": [
        {
            "files": "*.js",
            "options": {
                "singleQuote": true
            }
        },
        {
            "files": "*.ts",
            "options": {
                "singleQuote": true
            }
        },
        {
            "files": "*.blade.php",
            "options": {
                "parser": "blade",
                "printWidth": 80,
                "wrapAttributes": "force",
                "sortTailwindcssClasses": true,
                "wrapAttributesMinAttrs": 1,
                "noPhpSyntaxCheck": true,
                "useTabs": true,
                "singleQuote": true,
                "htmlWhitespaceSensitivity": "ignore",
                "bracketSameLine": false,
                "singleAttributePerLine": true
            }
        },
        {
            "files": "*.css",
            "options": {
                "singleQuote": false
            }
        },
        {
            "files": "*.scss",
            "options": {
                "singleQuote": false
            }
        }
    ],
    "plugins": ["@shufo/prettier-plugin-blade"]
}
```

### 5. Prettier Ignore (.prettierignore)
```
# Dependencies
node_modules/
vendor/

# Build outputs
public/build/
public/hot
storage/

# Logs
*.log

# Environment files
.env*

# Cache files
bootstrap/cache/
storage/framework/cache/
storage/framework/sessions/
storage/framework/testing/
storage/framework/views/

# Compiled assets
public/css/
public/js/
public/mix-manifest.json

# Laravel specific
storage/logs/
storage/app/
bootstrap/cache/

# Temporary files
*.tmp
*.temp
```

### 6. Laravel Pint Configuration (pint.json)
```json
{
    "preset": "psr12",
    "rules": {
        "array_syntax": {
            "syntax": "short"
        },
        "braces": {
            "position_after_functions_and_oop_constructs": "same"
        },
        "concat_space": {
            "spacing": "one"
        },
        "no_unused_imports": true,
        "trailing_comma_in_multiline": {
            "elements": ["arguments", "arrays", "match", "parameters"]
        }
    },
    "exclude": [
        "bootstrap/cache",
        "storage",
        "vendor"
    ]
}
```

### 7. VS Code Settings (.vscode/settings.json)
```json
{
    "editor.formatOnSave": true,
    "editor.defaultFormatter": "esbenp.prettier-vscode",
    "editor.insertSpaces": false,
    "editor.tabSize": 4,
    "editor.detectIndentation": false,
    "[php]": {
        "editor.defaultFormatter": "open-southeners.laravel-pint"
    },
    "[blade]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },
    "[javascript]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },
    "[typescript]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },
    "[json]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },
    "[css]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },
    "[scss]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },
    "files.associations": {
        "*.blade.php": "blade"
    },
    "emmet.includeLanguages": {
        "blade": "html"
    },
    "php.validate.executablePath": "php",
    "prettier.requireConfig": true,
    "prettier.configPath": ".prettierrc.json"
}
```

### 8. VS Code Extensions (.vscode/extensions.json)
```json
{
    "recommendations": [
        "esbenp.prettier-vscode",
        "open-southeners.laravel-pint",
        "shufo.vscode-blade-formatter",
        "onecentlin.laravel-blade",
        "bmewburn.vscode-intelephense-client",
        "bradlc.vscode-tailwindcss",
        "ryannaddy.laravel-artisan",
        "codingyu.laravel-goto-view",
        "amiralizadeh9480.laravel-extra-intellisense"
    ]
}
```

## Installation Commands
When setting up a new Laravel project with these guidelines:

1. Install dependencies:
```bash
npm install
composer install
```

2. Verify setup:
```bash
npm run quick-check
```

3. Fix any existing formatting issues:
```bash
npm run format-all
```

## Quick Commands Reference
- `npm run format` - Format frontend files only
- `npm run format-all` - Format all files (PHP + frontend)
- `npm run lint` - Check frontend formatting
- `npm run quick-check` - Check all formatting without fixing
- `npm run pre-push` - Format all + run tests (use before git push)
- `composer pint` - Format PHP files only
- `composer pint-test` - Check PHP formatting only

## Laravel Livewire & Translation Best Practices
- Use single quotes for Laravel translation functions: `__('Text')` not `__("Text")`
- Livewire attributes use single quotes: `:title="__('Title')"` not `:title="__("Title")"`
- Dynamic attributes: `wire:model="variable"`, `:status="session('status')"`
- Keep translation strings on single lines when possible for better parsing
- Use consistent quote styles: Blade templates with single quotes, JavaScript with single quotes

## File Organization Requirements
- Install Prettier and Laravel Pint as dev dependencies.
- Install Prettier + Blade plugin and Laravel Pint globally.
- Use Prettier for formatting frontend files.
- Use Laravel Pint for formatting PHP files.
- Use Prettier for formatting Blade templates.
- Use Laravel Pint for formatting PHP files.
- Use Prettier for formatting JavaScript files.
- Use Prettier for formatting CSS files.
- Use Prettier for formatting SCSS files.
- Use Prettier for formatting JSON files.
- Use Prettier for formatting all frontend files.
- Use Laravel Pint for formatting all PHP files except for Blade templates.
- Use Prettier for formatting all frontend files including Blade templates.
- Remove unused imports in JavaScript and TypeScript files and organize imports.
- Remove unused imports in PHP files and organize imports.
- add script npm run pre-push to run format-all, lint, and composer pint-test before pushing code on package.json.
````
