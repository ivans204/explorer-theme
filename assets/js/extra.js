$(document).ready(function () {
  // Header slider shadow
  $('#metaslider_122').after('<div class="img-shadow"></div>');

  // Offset top navbar
  let frontNav = $('#front-nav');
  let y = window.pageYOffset

  function frontPageNavScroll() {
    if (y >= 850) {
      frontNav.css({'background-color': 'rgba(0,0,0,0.5)'})
    } else if (y < 850) {
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

  //Front page about us
  let str = $('#about-us .about-us-text')[0].innerHTML.split(' ')
  str.splice(0, 2)
  str.splice(19, 0, '<br><br>')
  str.splice(40, 0, '<strong>')
  str.push('</strong>')
  $('#about-us .about-us-text')[0].innerHTML = str.join(' ');
  console.log(str);

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
  if (slides[slideIndex - 1]) {
    slides[slideIndex - 1].style.display = "block";
  }
}

showSlides(slideIndex);