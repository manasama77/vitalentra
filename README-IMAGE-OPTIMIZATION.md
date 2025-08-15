# Cross-Platform Image Optimization

This project includes cross-platform scripts for copying optimized WebP images during the build process.

## Available Scripts

### Node.js (Cross-Platform) - **Recommended**

```bash
npm run build        # Build project + copy optimized images
npm run copy-images  # Copy optimized images only
npm run build:only   # Build project without copying images
```

### PowerShell (Windows)

```powershell
.\copy-optimized-images.ps1
```

### Shell Script (Linux/macOS)

```bash
./scripts/copy-optimized-images.sh
```

## How It Works

1. **Automatic**: `npm run build` automatically copies optimized WebP images after Vite build
2. **Manual**: Use `npm run copy-images` to copy images without rebuilding
3. **Build Only**: Use `npm run build:only` for build without image copying

## Directory Structure

```
resources/images/optimized/     # Source WebP images
public/build/assets/optimized/  # Destination for production
```

## Platform Compatibility

- ✅ **Windows**: Node.js script + PowerShell script
- ✅ **Linux**: Node.js script + Shell script
- ✅ **macOS**: Node.js script + Shell script
- ✅ **CI/CD**: Node.js script works everywhere

## Benefits

- **Cross-Platform**: Node.js script works on all operating systems
- **Automated**: No manual steps required for production builds
- **Flexible**: Multiple script options for different environments
- **Size Optimized**: 92.2% reduction in image sizes with WebP format

## Usage in Components

Use the optimized image component:

```blade
<x-optimized-image :webpSrc="asset("build/assets/optimized/your-image.webp")"
																			:fallbackSrc="Vite::asset("resources/images/your-image.jpg")"
																			alt="Description"
																			class="w-full h-auto"
																			loading="lazy" />
```
