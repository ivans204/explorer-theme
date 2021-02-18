$(document).ready(function () {
  // Header slider shadow
  $('#metaslider_122').after('<div class="img-shadow"></div>');
  // $('#metaslider_57').after('<div class="img-shadow"></div>');

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


  /***
   * Front page map
   */

  const plava = '#193B56';
  const crvena = '#a80603';

  const svgMap = $('#hr-map-svg')

  const tureAll = [
    {
      close: $('#close-istra'),
      path: $('#hr-map-svg path[name*="Istarska"]'),
      details: $('#details-istra'),
      locate: $('#locate-istra')
    },
    {
      close: $('#close-lika'),
      path: $('#hr-map-svg path[name*="Licko-Senjska"]'),
      details: $('#details-lika'),
      locate: $('#locate-lika')
    },
    {
      close: $('#close-gk'),
      path: $('#hr-map-svg path[name*="Primorsko-Goranska"]'),
      details: $('#details-gk'),
      locate: $('#locate-gk')
    },
    {
      close: $('#close-sjd'),
      path: $('#hr-map-svg path[name*="Zadarska"]'),
      details: $('#details-sjd'),
      locate: $('#locate-sjd')
    },
  ]

  tureAll.forEach(function (tura) {

    tura.close.on('click', function () {
      tura.details.css('display', 'none');
      tura.path.css('fill', crvena);
      svgMap.css('pointer-events', 'all')
    })

    tura.locate.on('click', function () {
      tura.path.css('fill', plava);
      tura.details.css('display', 'block');
      svgMap.css('pointer-events', 'none')
    })

    tura.path.on('click', function () {
      $(this).css('fill', plava);
      tura.details.css('display', 'block');
      svgMap.css('pointer-events', 'none')
    })

    tura.path.addClass('active');

  })


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