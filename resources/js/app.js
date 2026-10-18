import './bootstrap';
import { Jodit } from 'jodit';
import 'jodit/es2021/jodit.min.css';

const header = document.getElementById('site-header');
const menuToggle = document.getElementById('menu-toggle');
const mainNav = document.getElementById('main-nav');

if (header) {
	const forceScrolled = header.classList.contains('scrolled');

	const setHeaderState = () => {
		if (forceScrolled || window.scrollY > 30) {
			header.classList.add('scrolled');
		} else {
			header.classList.remove('scrolled');
		}
	};

	setHeaderState();
	window.addEventListener('scroll', setHeaderState);
}

if (menuToggle && mainNav) {
	menuToggle.addEventListener('click', () => {
		mainNav.classList.toggle('open');
	});
}

const counters = document.querySelectorAll('.counter');
const animateCounter = (counter) => {
	const target = Number(counter.dataset.target || 0);
	const duration = 1500;
	const start = performance.now();

	const step = (now) => {
		const progress = Math.min((now - start) / duration, 1);
		counter.textContent = Math.floor(progress * target).toLocaleString();

		if (progress < 1) {
			requestAnimationFrame(step);
		}
	};

	requestAnimationFrame(step);
};

const revealItems = document.querySelectorAll('.reveal');
if (revealItems.length > 0) {
	const revealObserver = new IntersectionObserver((entries, observer) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				entry.target.classList.add('show');

				entry.target.querySelectorAll('.counter').forEach((counter) => {
					if (!counter.dataset.animated) {
						counter.dataset.animated = 'true';
						animateCounter(counter);
					}
				});

				observer.unobserve(entry.target);
			}
		});
	}, { threshold: 0.15 });

	revealItems.forEach((item) => revealObserver.observe(item));
}

const lightbox = document.getElementById('lightbox');
const lightboxImage = document.getElementById('lightbox-image');
const lightboxClose = document.getElementById('lightbox-close');

if (lightbox && lightboxImage) {
	document.querySelectorAll('[data-lightbox]').forEach((trigger) => {
		trigger.addEventListener('click', () => {
			const src = trigger.getAttribute('data-lightbox');
			if (!src) {
				return;
			}
			lightboxImage.setAttribute('src', src);
			lightbox.classList.add('show');
		});
	});

	const closeLightbox = () => {
		lightbox.classList.remove('show');
		lightboxImage.setAttribute('src', '');
	};

	lightboxClose?.addEventListener('click', closeLightbox);
	lightbox.addEventListener('click', (event) => {
		if (event.target === lightbox) {
			closeLightbox();
		}
	});
}

const slider = document.querySelector('[data-slider]');
if (slider) {
	const slides = slider.querySelectorAll('.testimonial-item');
	let index = 0;

	const activate = () => {
		slides.forEach((slide, i) => {
			slide.classList.toggle('active', i === index);
		});
	};

	if (slides.length > 0) {
		activate();
		setInterval(() => {
			index = (index + 1) % slides.length;
			activate();
		}, 3200);
	}
}

const richTextAreas = document.querySelectorAll('textarea.js-richtext');
if (richTextAreas.length > 0) {
	richTextAreas.forEach((textarea) => {
		const rows = Number(textarea.getAttribute('rows') || 0);
		const height = rows >= 10 ? 360 : 280;

		Jodit.make(textarea, {
			height,
			toolbarSticky: false,
			askBeforePasteHTML: false,
			askBeforePasteFromWord: false,
			cleanHTML: false,
			useBrAsDefault: false,
			defaultMode: 'wysiwyg',
			buttons: [
				'source', '|', 'bold', 'italic', 'underline', '|',
				'ul', 'ol', '|', 'font', 'fontsize', 'brush', '|',
				'align', 'outdent', 'indent', '|', 'link', 'image', 'table', '|',
				'undo', 'redo', 'hr', 'eraser', 'fullsize',
			],
			uploader: {
				insertImageAsBase64URI: true,
			},
		});
	});
}
