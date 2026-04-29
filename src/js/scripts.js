/*include /libs/jquery.core.js*/
/*include /libs/slick.js*/

(function($) { 
	
	var Master = {
		onready : function(){
			//////////////////// VIDÉO ////////////////////
			$('.cbo-video .video-player').on('click', function(e) {
				e.stopPropagation();
				$('.video-player').addClass('active');
				var video = document.querySelector('.video-player video');
				video.play();
			});


			//////////////// SCROLL ANIMATIONS ////////////////
			var scroll = window.requestAnimationFrame || function(callback){ window.setTimeout(callback, 1000/60)};
			var elementsToShow = document.querySelectorAll('.slide-up, .slide-up, .slide-right, .slide-left, .scale-up, .scale-down'); 
			function loop() {
				Array.prototype.forEach.call(elementsToShow, function(element){
					if (isElementInViewport(element)) {
						element.classList.add('anim-scroll');
					} else {
						element.classList.remove('anim-scroll');
					}
				});
				scroll(loop);
			}	
			loop();
			function isElementInViewport(el) {
				if (typeof jQuery === "function" && el instanceof jQuery) {
					el = el[0];
				}
				var rect = el.getBoundingClientRect();
				return (
					(rect.top <= 0&& rect.bottom >= 0)||(rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) && rect.top <= (window.innerHeight || document.documentElement.clientHeight))||(rect.top >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
				);
			}


			/////////////////// SLIDER PARTNERS ///////////////////
			$('.partners-list').slick({
				arrows : false,
				dots: true,
				infinite: true,
				slidesToShow: 6,
				slidesToScroll: 6,
				autoplaySpeed: 0,
				cssEase: 'linear',  
				responsive: [
					{
						breakpoint: 991,
						settings: {
							slidesToShow: 5,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					}
				]
			});


			//////////////////// UP BUTTON ////////////////////
			var upButton = document.querySelector(".cbo-up");
			var footer = document.querySelector("footer");
			function toggleUpButton() {
				var scrollY = window.scrollY || document.documentElement.scrollTop;
				var footerPosition = footer.getBoundingClientRect().top + window.scrollY;
				var windowHeight = window.innerHeight;
				if (scrollY > 200) {
					upButton.classList.add("show");
				} else {
					upButton.classList.remove("show");
				}
				if (scrollY + windowHeight >= footerPosition) {
					upButton.classList.add("hide");
				} else {
					upButton.classList.remove("hide");
				}
			}
			window.addEventListener("scroll", toggleUpButton);
			upButton.addEventListener("click", function () {
				window.scrollTo({ top: 0, behavior: "smooth" });
			});


			/////////////////// RESET CHECKBOXES AFTER CF7 SUBMIT ///////////////////
			document.addEventListener('wpcf7mailsent', function() {
				$(".cbo-form input[type='checkbox']").prop('checked', false);
				cbo_forms.check_checked();
			}, false);


			/////////////////// ADD CHECK TO ACCEPTANCE ///////////////////
			var cbo_forms = {
				init: function () {
				this.bind_checked();
				this.check_checked();
				},
				
				bind_checked: function () {
				$(".cbo-form")
					.find('input[type="radio"], input[type="checkbox"]')
					.on("change", function () {
					cbo_forms.check_checked();
					});
				},
				
				check_checked: function () {
				$(".cbo-form")
					.find('input[type="radio"], input[type="checkbox"]')
					.each(function () {
					if ($(this).is(":checked")) {
						$(this).closest(".form-field").find(".field-inner").addClass("checked");
					} else {
						$(this).closest(".form-field").find(".field-inner").removeClass("checked");
					}
					});
				},
			};
			cbo_forms.init();


			/////////////////// Ouverture d'une modale lors de la soumission d'un formulaire ///////////////////
			document.addEventListener('wpcf7mailsent', function(event) {
				event.preventDefault();

				var modal = document.createElement('div');
				modal.className = 'cbo-cf7modale';
				modal.innerHTML =
					'<div class="cf7modale-inner">' +
						'<i class="icon icon--success"></i>' +
						'<p>Votre message a bien été envoyé !</p>' +
						'<button type="button" class="cf7modale-button cbo-button" aria-label="Fermer la fenêtre">Fermer la fenêtre</button>' +
					'</div>';
				document.body.appendChild(modal);

				var closeButton = modal.querySelector('.cf7modale-button');
				closeButton.addEventListener('click', function() {
					modal.remove();
				});
			}, false);


			//////////////// STICKY ////////////////
			$(window).scroll(function(){
				if($(window).scrollTop()>80){
					$("header").addClass('header-scroll');
				}else{
					$("header").removeClass('header-scroll');
				}
			})
			.scroll();
			

			/////////////////// SMARTPHONE NAVIGATION ///////////////////
			$('.burger-menu').on('click', function(){
				$('.header-nav').toggleClass('nav--open');
				$('.burger-menu').toggleClass('burger-menu-cross');
				$('body').toggleClass('menu--open');
				$('html').toggleClass('html--hidden');
			});


			///////////////////  SOUS-MENU ///////////////////
			$('header .menu-item-has-children').on('click', function (e) {
				e.stopPropagation();
				var parentLi = $(this);
				$('header .menu-item-has-children').not(parentLi).find('.sub-menu').removeClass('submenu--open');
				$('header .menu-item-has-children').not(parentLi).removeClass('active');
				parentLi.find('.sub-menu').toggleClass('submenu--open');
				parentLi.toggleClass('active');
			});

			/////////////////// Burger menu - Accessibilité ///////////////////
			var burger = document.querySelector('.burger-menu');
			var nav = document.querySelector('.header-nav');
			if (burger && nav) {
				burger.addEventListener('click', function () {
					var expanded = burger.getAttribute('aria-expanded') === 'true';
					burger.setAttribute('aria-expanded', !expanded);
					burger.classList.toggle('is-active');
					nav.classList.toggle('is-open');
				});
			}

			//////////////// SUB-MENU HOVER ////////////////
			$('header .menu-item.menu-item-has-children').hover(function(){ 
				$('body').addClass('menu--open');
			},
			function(){ 
				$('body').removeClass('menu--open');
			})


			//////////////////// SEARCH MODALE ////////////////////
			$('.search-button .icon--search').on('click', function(){
				$('.overlay-search').toggleClass('overlay-search--open');
				$('body').toggleClass('body-noscroll');
			});
			$('.overlay-search .search-close').on('click', function(){
				$('.overlay-search').removeClass('overlay-search--open');
				$('body').removeClass('body-noscroll');
			});


			//////////////////// SEARCH MODALE - FOCUS ON INPUT ////////////////////
			var searchInput = document.getElementById('s');
			var searchButton = document.querySelector('.search-button');
			searchButton.addEventListener('click', function() {
				searchInput.focus();
			});


			//////////////////// FOOTER ////////////////////
			$('footer .footer-title').on('click', function(){
				$('.footer-nav').not($(this).siblings('.footer-nav')).removeClass('nav--open');
				$(this).siblings('.footer-nav').toggleClass('nav--open');
				$(this).toggleClass('title--open');
			});


			/////////////////// SOCIAL SHARE ///////////////////
			var shareButton = document.getElementById('linkedin-share-button');
			if (shareButton) {
				shareButton.addEventListener('click', function(event) {
					event.preventDefault();
					var pageUrl = window.location.href;
					var pageTitle = document.title;
					var linkedinUrl = 'https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(pageUrl) + '&title=' + encodeURIComponent(pageTitle);
					window.open(linkedinUrl, 'linkedin-share-dialog', 'width=800,height=600');
					return false;
				});
			}

			var twitterShareButton = document.getElementById('twitter-share-button');
			if (twitterShareButton) {
				twitterShareButton.addEventListener('click', function(event) {
					event.preventDefault();
					var pageUrl = window.location.href;
					var pageTitle = document.title;
					var twitterUrl = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(pageUrl) + '&text=' + encodeURIComponent(pageTitle);
					window.open(twitterUrl, 'twitter-share-dialog', 'width=800,height=600');
					return false;
				});
			}

			/////////////////// SCROLL ANCHOR ///////////////////
			$('a[href^="#"]').click(function(){
				var the_id = $(this).attr("href");
				var target = $(the_id);

				if (the_id === "#" || !target.length) return;

				$('html, body').animate({
					scrollTop: target.offset().top
				}, 'slow');
				return false;
			});


			// Smooth scroll
			$('.summary-options a[href^="#"]').on('click', function(e) {
				e.preventDefault();
				var target = $($(this).attr('href'));
				if (target.length) {
					$('html, body').animate({
						scrollTop: target.offset().top - 100
					}, 600);
				}
			});


			///////////////////// ACCORDION / TABS ///////////////////
			function initAdaptiveTabs() {
				var container = document.querySelector('.tabs-list');
				if (!container) return;

				function isMobile() {
					return window.innerWidth <= 768;
				}

				function getParentPanel(el) {
					while (el && el !== container) {
						if (el.classList.contains('list-tab')) return el;
						el = el.parentNode;
					}
					return null;
				}

				container.addEventListener('click', function(e) {
					var trigger = null;
					var target = e.target;
			
					while (target && target !== container) {
						if (target.classList.contains('tab-title')) {
							trigger = target;
							break;
						}
						target = target.parentNode;
					}

					if (!trigger) return;

					var panel = getParentPanel(trigger);
					if (!panel) return;

					var isActive = panel.classList.contains('is-active');
					var allPanels = container.querySelectorAll('.list-tab');

					if (!isMobile() || !isActive) {
						for (var i = 0; i < allPanels.length; i++) {
							allPanels[i].classList.remove('is-active');
							allPanels[i].querySelector('.tab-title').setAttribute('aria-expanded', 'false');
						}
					}

					if (!isActive || !isMobile()) {
						panel.classList.add('is-active');
						trigger.setAttribute('aria-expanded', 'true');
					} else {
						panel.classList.remove('is-active');
						trigger.setAttribute('aria-expanded', 'false');
					}
				});
			}

			if (document.readyState === 'loading') {
				document.addEventListener('DOMContentLoaded', initAdaptiveTabs);
			} else {
				initAdaptiveTabs();
			}


			/////////////////// FORMULAIRE EN DEUX ÉTAPES ///////////////////
			if (document.querySelector('.form-step')) {
				var formStep1 = document.querySelector('.form-step--1');
				var requiredFields = formStep1.querySelectorAll('[aria-required="true"]');
				var telephoneField = document.querySelector('input[name="telephone"]');
				var nextButton = formStep1.querySelector('.form-next-step');
				var prevButton = document.querySelector('.form-prev-step');
				var submitButton = document.querySelector('.wpcf7-submit');
			
				function validateField(field) {
					var value = field.value.trim();
					if (field.type === 'email') {
						var isValidEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
						return value !== '' && isValidEmail;
					}
					return value !== '';
				}
			
				function validatePhone(phone) {
					var value = phone.value.trim();
					if (value === '') return true;
					var phoneRegex = /^\d{10}$/;
					return phoneRegex.test(value);
				}
			
				function checkFormStep1Validity() {
					var allValid = true;
					for (var i = 0; i < requiredFields.length; i++) {
						if (!validateField(requiredFields[i])) {
							allValid = false;
						}
					}
					if (telephoneField && !validatePhone(telephoneField)) {
						allValid = false;
						telephoneField.classList.add('has-error');
					} else if (telephoneField) {
						telephoneField.classList.remove('has-error');
					}
					if (allValid) {
						if (nextButton) nextButton.classList.remove('disabled');
					} else {
						if (nextButton) nextButton.classList.add('disabled');
					}
				}
			
				// Validation en live sur les champs requis
				for (var i = 0; i < requiredFields.length; i++) {
					requiredFields[i].addEventListener('input', checkFormStep1Validity);
				}
				if (telephoneField) {
					telephoneField.addEventListener('input', checkFormStep1Validity);
				}
			
				// Bouton "Suivant"
				if (nextButton) {
					nextButton.addEventListener('click', function () {
						if (nextButton.classList.contains('disabled')) return;
						var step1 = document.querySelector('.form-step--1');
						var step2 = document.querySelector('.form-step--2');
						if (step1 && step2) {
							step1.style.display = 'none';
							step2.style.display = 'block';
						}
					});
				}
			
				// Bouton "Retour"
				if (prevButton) {
					prevButton.addEventListener('click', function () {
						var step1 = document.querySelector('.form-step--1');
						var step2 = document.querySelector('.form-step--2');
						if (step1 && step2) {
							step2.style.display = 'none';
							step1.style.display = 'flex';
						}
					});
				}
			
				checkFormStep1Validity();
			
				var telephoneField2 = document.querySelector('input[name="telephone"]');
			
				function showErrorMessage(container) {
					var existingError = container.querySelector('.radio-error-message');
					if (!existingError) {
						var message = document.createElement('div');
						message.className = 'radio-error-message';
						message.innerHTML = 'Réponse obligatoire';
						container.appendChild(message);
					}
				}
				function removeErrorMessage(container) {
					var existingError = container.querySelector('.radio-error-message');
					if (existingError) {
						container.removeChild(existingError);
					}
				}
			
				function validateRadioGroups() {
					var allRadioInputs = document.querySelectorAll('.form-step--2 input[type="radio"]');
					var groupNames = [];
					var allValid = true;
					for (var i = 0; i < allRadioInputs.length; i++) {
						var name = allRadioInputs[i].name;
						if (groupNames.indexOf(name) === -1) {
							groupNames.push(name);
						}
					}
					for (var j = 0; j < groupNames.length; j++) {
						var radios = document.querySelectorAll('input[name="' + groupNames[j] + '"]');
						var isChecked = false;
			
						for (var k = 0; k < radios.length; k++) {
							if (radios[k].checked) {
								isChecked = true;
								break;
							}
						}
						var wrapper = null;
						for (var l = 0; l < radios.length; l++) {
							var w = radios[l].closest('.form-field');
							if (w) {
								wrapper = w;
								break;
							}
						}
						if (!isChecked) {
							allValid = false;
							if (wrapper) {
								wrapper.classList.add('has-error');
								showErrorMessage(wrapper);
							}
						} else {
							if (wrapper) {
								wrapper.classList.remove('has-error');
								removeErrorMessage(wrapper);
							}
						}
					}
					return allValid;
				}
			
				// Validation finale au clic sur "Soumettre"
				if (submitButton) {
					submitButton.addEventListener('click', function (e) {
						var phoneValid = true;
			
						if (telephoneField2 && !validatePhone(telephoneField2)) {
							e.preventDefault();
							telephoneField2.classList.add('has-error');
							alert("Merci de saisir un numéro de téléphone valide à 10 chiffres ou de laisser le champ vide.");
							phoneValid = false;
						} else if (telephoneField2) {
							telephoneField2.classList.remove('has-error');
						}
			
						var radiosValid = validateRadioGroups();
			
						if (!radiosValid || !phoneValid) {
							e.preventDefault();
						}
					});
				}
			}


			/////////////////// RADIOS BUTTONS CLASS ///////////////////
			if ($('body .form-step').length > 0){
				var radios = document.querySelectorAll('.wpcf7-list-item input[type="radio"]');
				for (var i = 0; i < radios.length; i++) {
					radios[i].addEventListener('change', function () {
					var input = this;
					var group = input.closest('.wpcf7-radio');
					if (!group) return;

					var items = group.querySelectorAll('.wpcf7-list-item');
					for (var j = 0; j < items.length; j++) {
						items[j].classList.remove('checked');
					}

					var listItem = input.closest('.wpcf7-list-item');
					if (listItem) {
						listItem.classList.add('checked');
					}
					});
				}
				var labels = document.querySelectorAll('.wpcf7-list-item-label');
				for (var i = 0; i < labels.length; i++) {
					labels[i].addEventListener('click', function () {
						var input = this.previousElementSibling;
						if (input && input.type === 'radio') {
						input.checked = true;
						input.dispatchEvent(new Event('change'));
						}
					});
				}
			}

			/////////////////// ENVOIE DU SCORE DU FORMULAIRE ///////////////////
			if ($('body .form-step').length > 0){
				var form = document.querySelector('.wpcf7 form');
				if (!form) return;
				form.addEventListener('submit', function(event) {
					var score = 0;
					var reponses = [];
					var radios = form.querySelectorAll('input[type="radio"]');
					var questions = {};
					radios.forEach(function(radio) {
						questions[radio.name] = true;
					});

					for (var name in questions) {
						if (questions.hasOwnProperty(name)) {
							var checked = form.querySelector('input[name="' + name + '"]:checked');
							if (checked) {
								var s = parseInt(checked.getAttribute('data-score'), 10);
								if (!isNaN(s)) score += s;
								reponses.push('Réponse à la question ' + name.replace('radio-', '') + ' : ' + checked.value);
							}
						}
				  	}

					var scoreInput = form.querySelector('input[name="score"]');
					var reponsesInput = form.querySelector('input[name="reponses"]');
					if (scoreInput) scoreInput.value = score.toString();
					if (reponsesInput) reponsesInput.value = reponses.join('\n');
				});
			}

				
			///////////////////// Formulaires - Dates ///////////////////
			var formWrap = document.querySelector('.content-form[data-formation-id]');
			if (!formWrap) return;
			var formationId  = formWrap.dataset.formationId;
			var formationNom = formWrap.dataset.formationNom;
			var fieldId  = formWrap.querySelector('input[name="formation_id"]');
			var fieldNom = formWrap.querySelector('input[name="formation_nom"]');
			if (fieldId)  fieldId.value  = formationId;
			if (fieldNom) fieldNom.value = formationNom;
		},

		onload : function(){

		},

		onresize : function(){

		},

		onscroll : function(){

		},
	
	};

	$(document).ready( function(){
		Master.onready();
		
	});

	$(window).load( function(){
		Master.onload();
	});

	$(window).resize( function(){
		Master.onresize();
	});

	$(window).on('scroll', function(){
		Master.onscroll();
	});

})(jQuery);