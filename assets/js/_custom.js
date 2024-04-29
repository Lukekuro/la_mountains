import vars from './_vars';

// Helper functions:
import {throttle} from './functions/throttle';

// Plugins (NPM modules and uploaded files):
import Swiper, {Navigation, Pagination, Autoplay, Thumbs} from 'swiper/bundle'; // import Swiper bundle with all modules installed
// available Swiper.js modules = [Virtual, Keyboard, Mousewheel, Navigation, Pagination, Scrollbar, Parallax, Zoom, Lazy, Controller, A11y, History, HashNavigation, Autoplay, Thumbs, FreeMode, Grid, Manipulation, EffectFade, EffectCube, EffectFlip, EffectCoverflow, EffectCreative, EffectCards]
import { Fancybox } from "@fancyapps/ui"; // Fancybox

jQuery(document).ready(function ($) {
	"use strict";

	/**
	 * Tweak for mobiles (full height)
	 */
	const fixFullheight = () => {
		const vh = window.innerHeight * 0.01;
		vars.htmlEl.style.setProperty('--vh', `${vh}px`);
	};

	fixFullheight();
	const fixHeight = throttle(fixFullheight);
	window.addEventListener('resize', fixHeight);


	/**
	 * Force load of all lazy-loading images
	 */
	setTimeout(function () {
		$('.lazyload.loading').removeClass('loading').addClass('loaded');
	}, 3000);


	/**
	 * Slider gallery
	 */
	document.querySelectorAll( '.swiper-gallery' ).forEach(slider => {
		const swiper = new Swiper(slider, {
			slidesPerView: 2,
            slidesPerGroup: 1,
            spaceBetween: 10,
            breakpoints: {
				640: {
                    slidesPerView: 3,
                },
                1025: {
                    slidesPerView: 4,
                },
            },
			pagination: {
				el: slider.querySelector( '.swiper-pagination' ),
				clickable: true,
			},
			on: {
				// lazy load images
				slideChange: function () {
					try {
						lazyLoadInstance.update();
					} catch (e) {
					}
				}
			}
		});
	});

	// JS Lazyload fix for images on the first screen.
	// This code should run after all the code is initiated.
	$(window).trigger('scroll');

});

