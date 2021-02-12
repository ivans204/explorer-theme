$(document).ready(function () {
  // Header slider shadow
  $('#metaslider_122').after('<div class="img-shadow"></div>');
  // $('#metaslider_57').after('<div class="img-shadow"></div>');

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
  if ($('#about-us .about-us-text').length) {
    let str = $('#about-us .about-us-text')[0].innerHTML.split(' ')
    str.splice(0, 2)
    str.splice(19, 0, '<br><br>')
    str.splice(40, 0, '<strong>')
    str.push('</strong>')
    $('#about-us .about-us-text')[0].innerHTML = str.join(' ');
  }

  // Aktivnost AJAX

  const apiUrl = 'http://localhost:8080/explorer/wp-json/wp/v2/posts?slug=';
  // const apiUrl = 'https://dev.explorer.hr/wp-json/wp/v2/posts?slug=';
  let airContent = null;
  let waterContent = null;
  let earthContent = null;

  $('#activity-air').on('click', function () {
    loadPostData('zrak', '#collapseAir', airContent, '#air-loader')
  })

  $('#activity-water').on('click', function () {
    loadPostData('voda', '#collapseWater', waterContent, '#water-loader')
  })

  $('#activity-earth').on('click', function () {
    loadPostData('zemlja', '#collapseEarth', earthContent, '#earth-loader')
  })


  function loadPostData(postName, collapseId, isRendered, loaderId) {
    if (!isRendered) {
      $.ajax({
        url: apiUrl + postName,
        success: function (data) {
          $(collapseId).append(data[0].content.rendered)
          isRendered = data[0].content.rendered
          $(loaderId).hide();
        }
      })
    }
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
  if (slides[slideIndex - 1]) {
    slides[slideIndex - 1].style.display = "block";
  }
}

showSlides(slideIndex);