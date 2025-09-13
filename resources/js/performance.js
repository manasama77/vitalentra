/**
 * Performance monitoring and optimization utilities
 */

// Web Vitals monitoring
function measureWebVitals() {
	// Performance observer for paint metrics
	new PerformanceObserver(entryList => {
		for (const entry of entryList.getEntries()) {
			if (entry.name === 'first-contentful-paint') {
				console.log('FCP:', entry.startTime.toFixed(2), 'ms');
			}
			if (entry.name === 'first-paint') {
				console.log('FP:', entry.startTime.toFixed(2), 'ms');
			}
		}
	}).observe({ entryTypes: ['paint'] });

	// Largest Contentful Paint
	new PerformanceObserver(entryList => {
		const entries = entryList.getEntries();
		const lastEntry = entries[entries.length - 1];
		console.log('LCP:', lastEntry.startTime.toFixed(2), 'ms');
	}).observe({ entryTypes: ['largest-contentful-paint'] });

	// Total Blocking Time calculation
	let totalBlockingTime = 0;
	new PerformanceObserver(entryList => {
		for (const entry of entryList.getEntries()) {
			if (entry.duration > 50) {
				totalBlockingTime += entry.duration - 50;
			}
		}
		console.log('Current TBT:', totalBlockingTime.toFixed(2), 'ms');
	}).observe({ entryTypes: ['longtask'] });

	// Cumulative Layout Shift
	let clsValue = 0;
	new PerformanceObserver(entryList => {
		for (const entry of entryList.getEntries()) {
			if (!entry.hadRecentInput) {
				clsValue += entry.value;
			}
		}
		console.log('CLS:', clsValue.toFixed(4));
	}).observe({ entryTypes: ['layout-shift'] });
}

// Image loading optimization
function optimizeImageLoading() {
	// Intersection Observer for lazy loading
	const imageObserver = new IntersectionObserver(
		(entries, observer) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					const img = entry.target;

					// Swap data-src to src for lazy loading
					if (img.dataset.src) {
						img.src = img.dataset.src;
						img.removeAttribute('data-src');
					}

					// Swap data-srcset to srcset
					if (img.dataset.srcset) {
						img.srcset = img.dataset.srcset;
						img.removeAttribute('data-srcset');
					}

					// Add loaded class for fade-in effect
					img.addEventListener('load', () => {
						img.classList.add('loaded');
					});

					observer.unobserve(img);
				}
			});
		},
		{
			rootMargin: '50px',
		}
	);

	// Observe all images with data-src
	document.querySelectorAll('img[data-src]').forEach(img => {
		imageObserver.observe(img);
	});
}

// Resource hints optimization
function addResourceHints() {
	const head = document.head;

	// Add prefetch for likely next pages
	const prefetchUrls = ['/about', '/products', '/contact'];

	prefetchUrls.forEach(url => {
		const link = document.createElement('link');
		link.rel = 'prefetch';
		link.href = url;
		head.appendChild(link);
	});
}

// Critical resource preloading
function preloadCriticalResources() {
	const criticalResources = [
		{
			href: '/assets/fonts/inter-latin-400.woff2',
			as: 'font',
			type: 'font/woff2',
			crossorigin: true,
		},
	];

	criticalResources.forEach(resource => {
		const link = document.createElement('link');
		link.rel = 'preload';
		link.href = resource.href;
		link.as = resource.as;
		if (resource.type) link.type = resource.type;
		if (resource.crossorigin) link.crossOrigin = 'anonymous';
		document.head.appendChild(link);
	});
}

// Service Worker registration for caching
function registerServiceWorker() {
	if ('serviceWorker' in navigator && location.hostname !== 'localhost') {
		window.addEventListener('load', () => {
			navigator.serviceWorker
				.register('/sw.js')
				.then(registration => {
					console.log('SW registered: ', registration);
				})
				.catch(registrationError => {
					console.log('SW registration failed: ', registrationError);
				});
		});
	}
}

// Initialize performance optimizations
function initPerformanceOptimizations() {
	// Only run in production or when explicitly enabled
	if (import.meta.env.PROD || window.enablePerformanceMonitoring) {
		measureWebVitals();
	}

	optimizeImageLoading();
	preloadCriticalResources();

	// Register service worker in production
	if (import.meta.env.PROD) {
		registerServiceWorker();
	}
}

// Auto-initialize when DOM is ready
if (document.readyState === 'loading') {
	document.addEventListener('DOMContentLoaded', initPerformanceOptimizations);
} else {
	initPerformanceOptimizations();
}

// Export for manual usage
window.performanceUtils = {
	measureWebVitals,
	optimizeImageLoading,
	addResourceHints,
	preloadCriticalResources,
};
