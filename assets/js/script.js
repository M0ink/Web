'use strict';

/**
 * element toggle function
 */

const elemToggleFunc = function (elem) { elem.classList.toggle("active"); }



/**
 * navbar variables
 */

const navbar = document.querySelector("[data-nav]");
const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");
const overlay = document.querySelector("[data-overlay]");

const navElemArr = [navOpenBtn, navCloseBtn, overlay];

for (let i = 0; i < navElemArr.length; i++) {

  navElemArr[i].addEventListener("click", function () {
    elemToggleFunc(navbar);
    elemToggleFunc(overlay);
    elemToggleFunc(document.body);
  })

}



/**
 * go top
 */

const goTopBtn = document.querySelector("[data-go-top]");

window.addEventListener("scroll", function () {

  if (window.scrollY >= 800) {
    goTopBtn.classList.add("active");
  } else {
    goTopBtn.classList.remove("active");
  }

})

/*cHATBOT*/
/*Animacion en acerca de nosotros*/
/*Animacion en hero*/

document.addEventListener("DOMContentLoaded", function() {
  const elementsToAnimate = document.querySelectorAll('.animate-on-scroll');
  elementsToAnimate.forEach(function(element) {
    element.style.transitionDelay = '0s';
    element.classList.add('animate-on-scroll');
  });
});

// Función para mostrar/ocultar el menú desplegable
function toggleDropdown() {
  var dropdownContent = document.getElementById("dropdown-content");
  dropdownContent.classList.toggle("show");
}

// Función para cambiar la transmisión en el reproductor de Twitch
function changeStream(channel) {
  var twitchPlayer = document.getElementById("twitch-embed");
  twitchPlayer.innerHTML = ''; // Borra el reproductor actual
  new Twitch.Embed("twitch-embed", {
      width: 1280,
      height: 720,
      channel: channel,
      layout: "video",
      autoplay: true,
      parent: ["tu-sitio-web.com"], // Cambia esto con tu dominio permitido
      createEl: true
  });
}


$(document).ready(function () {

  function showPopup(){
      $('.pop-up').addClass('show');
      $('.pop-up-wrap').addClass('show');
  }

  $("#close").click(function(){
      $('.pop-up').removeClass('show');
      $('.pop-up-wrap').removeClass('show');
  });

  $(".btn-sign_in").click(showPopup);

  /*setTimeout(showPopup, 2000);*/

});

// script.js

document.addEventListener("DOMContentLoaded", function() {
  var openLoginPopupButton = document.getElementById('openLoginPopup');
  var loginPopup = document.querySelector('.pop-up');

  if (openLoginPopupButton && loginPopup) {
    openLoginPopupButton.addEventListener('click', function() {
      loginPopup.classList.toggle('show');
    });
  }
});
