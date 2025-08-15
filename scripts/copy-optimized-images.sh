#!/bin/bash

# Shell script to copy optimized WebP images after build
# This ensures optimized images are available in the public directory

# Colors for output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
CYAN='\033[0;36m'
WHITE='\033[1;37m'
NC='\033[0m' # No Color

echo -e "${GREEN}Copying optimized WebP images to build directory...${NC}"

# Define directories
SOURCE_DIR="resources/images/optimized"
TARGET_DIR="public/build/assets/optimized"

# Check if source directory exists
if [ ! -d "$SOURCE_DIR" ]; then
    echo -e "${YELLOW}Warning: Source directory does not exist: $SOURCE_DIR${NC}"
    exit 1
fi

# Create target directory if it doesn't exist
if [ ! -d "$TARGET_DIR" ]; then
    mkdir -p "$TARGET_DIR"
    echo -e "${YELLOW}Created optimized directory: $TARGET_DIR${NC}"
fi

# Copy WebP files and calculate sizes
total_size=0
file_count=0

echo -e "${CYAN}Optimized images available:${NC}"

for file in "$SOURCE_DIR"/*.webp; do
    if [ -f "$file" ]; then
        filename=$(basename "$file")
        cp "$file" "$TARGET_DIR/"

        # Get file size in KB
        size_bytes=$(stat -c%s "$TARGET_DIR/$filename" 2>/dev/null || stat -f%z "$TARGET_DIR/$filename" 2>/dev/null)
        size_kb=$((size_bytes / 1024))

        echo -e "${WHITE}  $filename (${size_kb} KB)${NC}"

        total_size=$((total_size + size_kb))
        file_count=$((file_count + 1))
    fi
done

if [ $file_count -eq 0 ]; then
    echo -e "${YELLOW}No WebP files found to copy${NC}"
    exit 1
fi

echo -e "${GREEN}Copied $file_count WebP files to: $TARGET_DIR${NC}"
echo -e "${CYAN}Total optimized images size: ${total_size} KB${NC}"
echo -e "${GREEN}Optimized images are ready for production!${NC}"
