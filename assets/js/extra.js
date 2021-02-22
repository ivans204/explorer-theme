$(document).ready(function () {
  // Header slider shadow
  $('#metaslider_122').after('<div class="img-shadow"></div>');
  // $('#metaslider_57').after('<div class="img-shadow"></div>');

  // Offset top navbar
  const frontNav = $('#front-nav');
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
    str.splice(0, 1)
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

  function scrollFromTop() {
    $([document.documentElement, document.body]).animate({
      scrollTop: $('body').position().top += 200
    }, 2000);
  }

  $('#activity-air').on('click', function () {
    cd wp scrollFromTop()
    loadPostData('zrak', '#collapseAir', airContent, '#air-loader')
  })

  $('#activity-water').on('click', function () {
    scrollFromTop()
    loadPostData('voda', '#collapseWater', waterContent, '#water-loader')
  })

  $('#activity-earth').on('click', function () {
    scrollFromTop()
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

    // Close all modals
  const mapClass = $('.map-ture-details')
  const closeClass = $('.close-tura-details')

  closeClass.each(function () {
    $(this).on('click', function () {
      mapClass.removeClass('show')
      $('path.active').each(function () {
        $(this).removeClass('clicked')
      })
    })
  })

  const tureAll = [
    {
      path: $('#hr-map-svg path[name*="Istarska"]'),
      details: $('#details-istra'),
      locate: $('#locate-istra')
    },
    {
      path: $('#hr-map-svg path[name*="Licko-Senjska"]'),
      details: $('#details-lika'),
      locate: $('#locate-lika')
    },
    {
      path: $('#hr-map-svg path[name*="Primorsko-Goranska"]'),
      details: $('#details-gk'),
      locate: $('#locate-gk')
    },
    {
      path: $('#hr-map-svg path[name*="Zadarska"]'),
      details: $('#details-sjd'),
      locate: $('#locate-sjd')
    },
  ]

  tureAll.forEach(function (tura) {

    tura.locate.on('click', function () {
      tura.path.addClass('clicked');
      tura.details.addClass('show');
    })

    tura.path.on('click', function () {

      if ($(this).hasClass('clicked')) {

        $(this).removeClass('clicked')
        tura.details.removeClass('show');

      } else {

        tura.path.addClass('clicked')
        $('path.active').each(function () {
          $(this).not(tura.path).each(function () {
            $(this).removeClass('clicked')
          })
        })

        if (tura.details.hasClass('show')) {
          tura.details.removeClass('show');
          console.log('tu sam')
        } else {
          tura.details.addClass('show');
          $('.map-ture-details').each(function () {
            $(this).not(tura.details).each(function () {
              $(this).removeClass('show');
            });
          })
        }
      }
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