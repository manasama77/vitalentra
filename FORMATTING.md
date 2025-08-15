# Vitalentra - Code Formatting Setup

This project uses a comprehensive code formatting setup based on the custom Laravel instructions.

## Tools Used

### 1. Laravel Pint (PHP)

- **Purpose**: Formats all PHP files according to PSR-12 standards
- **Configuration**: `pint.json`
- **Usage**:
    - `composer pint` - Format all PHP files
    - `composer pint-test` - Check PHP files for formatting issues

### 2. Prettier (Frontend)

- **Purpose**: Formats JavaScript, TypeScript, CSS, SCSS, JSON, and Blade templates
- **Configuration**: `.prettierrc.json`
- **Usage**:
    - `npm run format` - Format all frontend files
    - `npm run lint` - Check frontend files for formatting issues
    - `npm run format-all` - Format both PHP and frontend files

## Quick Commands

```bash
# Check all code formatting
npm run quick-check

# Format all files (PHP + Frontend)
npm run format-all

# Pre-push checks (format + lint + pint test)
npm run pre-push
```

## Formatting Rules

### PHP Files (Laravel Pint)

- **Standard**: PSR-12 with custom rules
- **Indentation**: 4 tabs
- **Quotes**: Double quotes for interpolation, single quotes without
- **Arrays**: Short syntax `[]` with trailing commas in multiline
- **Braces**: Opening brace on same line (PSR-12 style)
- **Imports**: Unused imports automatically removed

### JavaScript/TypeScript Files (Prettier)

- **Indentation**: 4 tabs
- **Quotes**: Single quotes for strings
- **Semicolons**: Required
- **Template Literals**: Preferred for interpolation

### CSS/SCSS Files (Prettier)

- **Indentation**: 4 tabs
- **Quotes**: Double quotes for strings

### Blade Templates (Prettier + Blade Plugin)

- **Indentation**: 4 tabs
- **Quotes**: Single quotes in Blade directives
- **Script Tags**: Double quotes for strings in script tags
- **Attributes**: Force expand multiline for readability
- **Tailwind**: Classes automatically sorted

### JSON Files (Prettier)

- **Indentation**: 4 tabs
- **Quotes**: Double quotes (JSON standard)

## VS Code Integration

The project includes VS Code configuration in `.vscode/` folder:

### Recommended Extensions

- Laravel Pint (PHP formatting)
- Prettier (Frontend formatting)
- Blade Formatter
- Laravel Blade syntax highlighting
- Tailwind CSS IntelliSense

### Auto-formatting

- **Format on Save**: Enabled
- **PHP Files**: Automatically formatted with Laravel Pint
- **Other Files**: Automatically formatted with Prettier

## Project Structure

```
├── .prettierrc.json          # Prettier configuration
├── .prettierignore          # Files to ignore in Prettier
├── pint.json                # Laravel Pint configuration
├── .vscode/
│   ├── settings.json        # VS Code workspace settings
│   └── extensions.json      # Recommended extensions
├── package.json             # NPM scripts for formatting
└── composer.json            # Composer scripts for Pint
```

## Installation

1. **Install dependencies**:

    ```bash
    npm install
    composer install
    ```

2. **Install recommended VS Code extensions**:
    - Open VS Code
    - Go to Extensions (Ctrl+Shift+X)
    - Install recommended extensions when prompted

3. **Verify setup**:
    ```bash
    npm run quick-check
    ```

## Workflow

### Development

1. Write code normally
2. Files auto-format on save (if using VS Code)
3. Run `npm run quick-check` periodically

### Before Committing

```bash
npm run pre-push
```

This command will:

1. Format all files
2. Check for formatting issues
3. Run PHP style tests
4. Exit with error if any issues found

## Troubleshooting

### Common Issues

1. **Prettier not formatting Blade files**:
    - Ensure `@shufo/prettier-plugin-blade` is installed
    - Check that `.blade.php` files are associated with the blade parser

2. **Laravel Pint not running**:
    - Ensure Laravel Pint is installed: `composer require --dev laravel/pint`
    - Check `pint.json` configuration is valid

3. **VS Code not auto-formatting**:
    - Check that recommended extensions are installed
    - Verify `.vscode/settings.json` is present
    - Ensure "Format on Save" is enabled

### Manual Formatting

If auto-formatting isn't working:

```bash
# Format specific file types
npx prettier --write "resources/**/*.js"
npx prettier --write "resources/**/*.blade.php"
./vendor/bin/pint app/
```

## Configuration Files

### .prettierrc.json

Defines formatting rules for all frontend files and Blade templates.

### pint.json

Defines PHP formatting rules based on PSR-12 with custom enhancements.

### .vscode/settings.json

Configures VS Code to use the correct formatters for each file type.
