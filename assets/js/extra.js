$(document).ready(function () {
  // Header slider shadow
  $('#metaslider_122').after('<div class="img-shadow"></div>');

  // Offset top navbar
  let frontNav = $('#front-nav');
  let y = window.pageYOffset

  function frontPageNavScroll() {
    if (y >= 800) {
      frontNav.css({'background-color': 'rgba(0,0,0,0.5)'})
    } else if (y < 800) {
      frontNav.css({'background-color': 'transparent'})
    }
  }

  if (frontNav) {

    frontPageNavScroll();

    $(window).scroll(function () {
      y = window.pageYOffset
      frontPageNavScroll()
    });
  }

});

// Slider
var slideIndex = 1;

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");

  if (n > slides.length) {
    slideIndex = 1
  }
  if (n < 1) {
    slideIndex = slides.length
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}

showSlides(slideIndex);