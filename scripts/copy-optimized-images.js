#!/usr/bin/env node

import { fileURLToPath } from 'url';
import { dirname, join } from 'path';
import { existsSync, mkdirSync, readdirSync, copyFileSync, statSync } from 'fs';
import { cwd } from 'process';

// Get the project root directory
const projectRoot = cwd();

// Colors for console output
const colors = {
	green: '\x1b[32m',
	yellow: '\x1b[33m',
	cyan: '\x1b[36m',
	white: '\x1b[37m',
	reset: '\x1b[0m',
};

function log(message, color = 'white') {
	console.log(`${colors[color]}${message}${colors.reset}`);
}

function copyOptimizedImages() {
	log('Copying optimized WebP images to build directory...', 'green');

	const sourceDir = join(projectRoot, 'resources', 'images', 'optimized');
	const targetDir = join(
		projectRoot,
		'public',
		'build',
		'assets',
		'optimized'
	);

	// Check if source directory exists
	if (!existsSync(sourceDir)) {
		log('Warning: Source directory does not exist: ' + sourceDir, 'yellow');
		return;
	}

	// Create target directory if it doesn't exist
	if (!existsSync(targetDir)) {
		mkdirSync(targetDir, { recursive: true });
		log(`Created optimized directory: ${targetDir}`, 'yellow');
	}

	// Get all WebP files from source
	const webpFiles = readdirSync(sourceDir).filter(file =>
		file.endsWith('.webp')
	);

	if (webpFiles.length === 0) {
		log('No WebP files found to copy', 'yellow');
		return;
	}

	// Copy each WebP file
	let totalSize = 0;
	webpFiles.forEach(file => {
		const sourcePath = join(sourceDir, file);
		const targetPath = join(targetDir, file);

		try {
			copyFileSync(sourcePath, targetPath);
			const stats = statSync(targetPath);
			const sizeKB = Math.round((stats.size / 1024) * 10) / 10;
			totalSize += sizeKB;
			log(`  ${file} (${sizeKB} KB)`, 'white');
		} catch (error) {
			log(`Error copying ${file}: ${error.message}`, 'yellow');
		}
	});

	log(`Copied ${webpFiles.length} WebP files to: ${targetDir}`, 'green');
	log(
		`Total optimized images size: ${Math.round(totalSize * 10) / 10} KB`,
		'cyan'
	);
	log('\nOptimized images are ready for production!', 'green');
}

// Run the script
copyOptimizedImages();
