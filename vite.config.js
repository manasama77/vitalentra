import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import webfontDownload from 'vite-plugin-webfont-dl';

export default defineConfig({
	plugins: [
		laravel({
			input: [
				'resources/css/landing.css',
				'resources/css/app.css',
				'resources/js/landing.js',
				'resources/js/modal.js',
				'resources/js/app.js',
				// Original images (keep existing paths)
				'resources/images/Management - Marida.jpg',
				'resources/images/Management - Beka Masinggil.jpg',
				'resources/images/Management - M. Nuzullaiman.jpg',
				'resources/images/Management - Tito Masinggil.jpg',
				'resources/images/Management - Renya Nuringtyas.jpg',
				'resources/images/tentang_kami_cover.jpg',
				'resources/images/Halal_Indonesia.svg',
				'resources/images/logo.png',
				'resources/images/logo_white.png',
				'resources/images/BP Group Logo.png',
				'resources/images/Testimonials - Teuku Wisnu.jpg',
				'resources/images/Testimonials - Irwansyah.jpg',
				'resources/images/Testimonials - Mario Irwinsyah.jpg',
				'resources/images/Testimonials - Citra Kirana.jpg',
				'resources/images/Testimonials - Natasha Rizky.jpg',
				'resources/images/products/belgie/1.jpg',
				'resources/images/products/belgie/2.jpg',
				'resources/images/products/belgie/3.jpg',
				'resources/images/products/belgie/4.jpg',
				'resources/images/products/belgie/5.jpg',
				'resources/images/products/british propolis green/1.jpg',
				'resources/images/products/british propolis green/2.jpg',
				'resources/images/products/british propolis green/3.jpg',
				'resources/images/products/british propolis norway/1.jpg',
				'resources/images/products/british propolis norway/2.jpg',
				'resources/images/products/british propolis norway/3.jpg',
				'resources/images/products/british propolis reguler/1.jpg',
				'resources/images/products/british propolis reguler/2.jpg',
				'resources/images/products/british propolis reguler/3.jpg',
				'resources/images/products/steffi/1.jpg',
				'resources/images/products/steffi/2.jpg',
				'resources/images/products/steffi/3.jpg',
			],
			refresh: true,
		}),
		tailwindcss(),
	],
	server: {
		cors: true,
	},
	build: {
		// rollupOptions: {
		// 	output: {
		// 		manualChunks: {
		// 			vendor: ['flyonui']
		// 		}
		// 	}
		// },
		minify: true,
		target: 'es2015',
		cssCodeSplit: true,
	},
});
