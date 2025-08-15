'use strict';

// Page loading
var pageLoading = document.querySelector('.page-loading');

localStorage.setItem('Vitalentra_WebTheme', 'vitalentra');

if (pageLoading) {
	window.addEventListener('load', () => {
		pageLoading.classList.add('hide');

		setTimeout(() => {
			pageLoading.style.display = 'none';
		}, 1000);
	});
}

// Navbar
const navbar = document.querySelector('.ic-navbar'),
	navbarToggler = navbar.querySelector('[data-web-toggle=navbar-collapse]');

const navbarBrandWhite = document.getElementById('NavbarBrandWhite'),
	navbarBrandDark = document.getElementById('NavbarBrandDark'),
	btnNavbar = document.querySelector('.btn-navbar');

navbarToggler.addEventListener('click', function () {
	const dataTarget = this.dataset.webTarget,
		targetElement = document.getElementById(dataTarget),
		isExpanded = this.ariaExpanded === 'true';

	if (!targetElement) {
		return;
	}

	navbar.classList.toggle('menu-show');
	this.ariaExpanded = !isExpanded;
	navbarToggler.innerHTML = navbar.classList.contains('menu-show')
		? '<i class="fa-solid fa-xmark"></i>'
		: '<i class="fa-solid fa-bars"></i>';
});

// Sticky navbar
window.addEventListener('scroll', function () {
	if (this.scrollY >= 72) {
		navbar.classList.add('sticky');
		if (navbarBrandWhite && navbarBrandDark) {
			navbarBrandWhite.classList.add('hidden');
			navbarBrandDark.classList.remove('hidden');
			// btnNavbar.classList.add("bg-primary", "bg-opacity-20");
		}
	} else {
		navbar.classList.remove('sticky');
		if (navbarBrandWhite && navbarBrandDark) {
			navbarBrandWhite.classList.remove('hidden');
			navbarBrandDark.classList.add('hidden');
			// btnNavbar.classList.remove("bg-primary-color", "bg-opacity-20");
		}
	}
});

// Web theme
const webTheme = document.querySelector('[data-web-trigger=web-theme]'),
	html = document.querySelector('html');

window.addEventListener('load', function () {
	var theme = localStorage.getItem('Vitalentra_WebTheme');

	if (theme == 'vitalentra') {
		webTheme.innerHTML = '<i class="lni lni-sun"></i>';
	} else if (theme == 'dark') {
		webTheme.innerHTML = '<i class="lni lni-night"></i>';
	} else {
		theme = 'vitalentra';
		localStorage.setItem('Vitalentra_WebTheme', theme);
		webTheme.innerHTML = '<i class="lni lni-night"></i>';
	}
	html.dataset.theme = theme;
});

webTheme.addEventListener('click', function () {
	var theme = localStorage.getItem('Vitalentra_WebTheme');

	webTheme.innerHTML =
		theme == 'dark'
			? '<i class="lni lni-sun"></i>'
			: '<i class="lni lni-night"></i>';
	// theme = theme == "dark" ? "vitalentra" : "dark";
	theme = 'vitalentra';
	localStorage.setItem('Vitalentra_WebTheme', theme);
	html.dataset.theme = theme;
});

// Scrollspy
// function scrollspy(event) {
// 	// Only run scrollspy on home page
// 	if (window.location.pathname !== '/') {
// 		return;
// 	}

// 	var links = document.querySelectorAll('.ic-page-scroll'),
// 		scrollpos =
// 			window.pageYOffset ||
// 			document.documentElement.scrollTop ||
// 			document.body.scrollTop;

// 	for (let i = 0; i < links.length; i++) {
// 		var currentLink = links[i],
// 			dataTarget = currentLink.getAttribute('href'),
// 			targetElement = document.querySelector(dataTarget),
// 			topminus = scrollpos + 74;

// 		if (targetElement) {
// 			if (
// 				targetElement.offsetTop <= topminus &&
// 				targetElement.offsetTop + targetElement.offsetHeight > topminus
// 			) {
// 				document
// 					.querySelector('.ic-page-scroll')
// 					.classList.remove('active');
// 				currentLink.classList.add('active');
// 			} else {
// 				currentLink.classList.remove('active');
// 			}
// 		}
// 	}
// }

// window.document.addEventListener('scroll', scrollspy);

// Menu scroll
const pageLink = document.querySelectorAll('.ic-page-scroll');

pageLink.forEach(link => {
	link.addEventListener('click', function (e) {
		const href = link.getAttribute('href');

		// Only prevent default and smooth scroll on home page with anchor links
		if (window.location.pathname === '/' && href && href.startsWith('#')) {
			e.preventDefault();

			const targetElement = document.querySelector(href);

			if (targetElement) {
				targetElement.scrollIntoView({
					behavior: 'smooth',
					offsetTop: 1 - 74,
				});
			}

			navbar.classList.remove('menu-show');
			navbarToggler.innerHTML = navbar.classList.contains('menu-show')
				? '<i class="fa-solid fa-xmark"></i>'
				: '<i class="fa-solid fa-bars"></i>';
		}
		// On other pages or non-anchor links, let the browser handle navigation normally
	});
});

// Tabs
const tabs = document.querySelectorAll('.tabs');

tabs.forEach(tab => {
	const links = tab.querySelectorAll('.tabs-nav .tabs-link'),
		contents = tab.querySelectorAll('.tabs-content');

	// Check if we have both links and contents
	if (!contents || contents.length === 0 || !links || links.length === 0) {
		return;
	}

	window.addEventListener('load', function () {
		for (let i = 0; i < contents.length; i++) {
			contents[i].classList.add('hide');
		}

		for (let i = 0; i < links.length; i++) {
			links[i].classList.remove('active');
			links[i].ariaSelected = false;
		}

		// Check if first link exists before accessing it
		if (links[0]) {
			links[0].classList.add('active');
			links[0].ariaSelected = true;

			const dataTarget = links[0].dataset.webTarget,
				targetElement = this.document.getElementById(dataTarget);

			if (targetElement) {
				targetElement.classList.remove('hide');
			}
		}
	});

	links.forEach(link => {
		const dataTarget = link.dataset.webTarget,
			targetElement = document.getElementById(dataTarget);

		if (targetElement) {
			link.addEventListener('click', function () {
				for (let i = 0; i < contents.length; i++) {
					contents[i].classList.add('hide');
				}

				for (let i = 0; i < links.length; i++) {
					links[i].classList.remove('active');
					links[i].ariaSelected = false;
				}

				link.classList.add('active');
				link.ariaSelected = true;
				targetElement.classList.remove('hide');
			});
		} else {
			link.disabled = true;
		}
	});
});

// Portfolio filter
const portfolioFilters = document.querySelectorAll('.portfolio-menu button');

portfolioFilters.forEach(filter => {
	filter.addEventListener('click', function () {
		let btn = portfolioFilters[0];

		while (btn) {
			if (btn.tagName === 'BUTTON') {
				btn.classList.remove('active');
			}

			btn = btn.nextSibling;
		}

		this.classList.add('active');

		let selected = filter.getAttribute('data-filter'),
			itemsToHide = document.querySelectorAll(
				'.portfolio-grid .portfolio :not([data-filter="' +
					selected +
					'"])'
			),
			itemsToShow = document.querySelectorAll(
				'.portfolio-grid .portfolio [data-filter="' + selected + '"]'
			);

		if (selected == 'all') {
			itemsToHide = [];
			itemsToShow = document.querySelectorAll(
				'.portfolio-grid .portfolio [data-filter]'
			);
		}

		itemsToHide.forEach(el => {
			el.parentElement.classList.add('hide');
			el.parentElement.classList.remove('show');
		});

		itemsToShow.forEach(el => {
			el.parentElement.classList.remove('hide');
			el.parentElement.classList.add('show');
		});
	});
});

// FlyonUI Carousel is now handled natively by the framework
// Custom product carousel functionality is no longer needed

// Scroll to top
let st = document.querySelector('[data-web-trigger=scroll-top]');
// Whatsapp Float
let whatsappFloatBtn = document.querySelector('[data-web-trigger=whatsapp]');

if (st) {
	window.onscroll = function () {
		if (
			document.body.scrollTop > 50 ||
			document.documentElement.scrollTop > 50
		) {
			st.classList.remove('is-hided');
			whatsappFloatBtn.classList.remove('is-hided');
		} else {
			st.classList.add('is-hided');
			whatsappFloatBtn.classList.add('is-hided');
		}
	};

	st.addEventListener('click', function () {
		window.scrollTo({
			top: 0,
			behavior: 'smooth',
		});
	});
}
