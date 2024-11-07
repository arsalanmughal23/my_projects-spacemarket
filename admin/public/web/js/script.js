
document.addEventListener('DOMContentLoaded', function() {
  var radioButtons = document.querySelectorAll('input[name="department_id"]');
  var selbutton = document.querySelector('.select-department-btn');

  radioButtons.forEach(function(radio) {
    radio.addEventListener('change', function() {
      // Replace button text while keeping the image
      var img = selbutton.querySelector('img');
      selbutton.innerHTML = ''; // Clear current content
      selbutton.appendChild(img); // Re-add the image
      selbutton.appendChild(document.createTextNode(' ' + radio.nextElementSibling.textContent)); // Add the selected text

      // Hide the dropdown
      var collapseElement = document.getElementById('collapseOne');
      var collapse = new bootstrap.Collapse(collapseElement, {
        toggle: false
      });
      collapse.hide();
    });
  });



  const listItems = document.querySelectorAll('.myList li');
  let lastOddChild = null;

  if (listItems) {
    // Loop through list items to find the last odd-indexed child
    for (let i = 0; i < listItems.length; i++) {
      if ((i + 1) % 2 !== 0) { // (i + 1) because NodeList is zero-indexed
        lastOddChild = listItems[i];
      }
    }
  }

  // Check if the last item is odd-indexed and add class to the last odd child if true
  if (lastOddChild && (listItems.length % 2 !== 0)) {
    lastOddChild.classList.add('last-odd-child');
  }



});

document.addEventListener('DOMContentLoaded', (event) => {
  const phoneInputs = document.querySelectorAll('input[type="tel"]');

  phoneInputs.forEach(input => {
      input.addEventListener('keypress', function(event) {
          const charCode = event.charCode;
          if (charCode !== 0) {
              const char = String.fromCharCode(charCode);
              if (!/[0-9]/.test(char)) {
                  event.preventDefault();
              }
          }
      });

      input.addEventListener('input', function(event) {
          this.value = this.value.replace(/[^0-9]/g, '');
      });
  });
});

document.addEventListener("DOMContentLoaded", function() {
  const accordionButtons = document.querySelectorAll('.select-department-btn ');
  if(accordionButtons){
      accordionButtons.forEach(button => {
          button.addEventListener('click', function(event) {
              event.preventDefault(); // Prevent the form from being submitted

              const accordionItem = this.parentElement;
              const isActive = accordionItem.classList.contains('active');

              // Collapse all accordion items
              document.querySelectorAll('.accordion-item').forEach(item => {
                  item.classList.remove('active');
              });

              // Toggle the clicked accordion item
              if (!isActive) {
                  accordionItem.classList.add('active');
              }
          });
      });

  }
  
});


window.addEventListener('load', function() {
  const preloader = document.getElementById('preloader');
  const content = document.getElementById('content');
if(preloader) {   preloader.style.display = 'none';  }


// var videoModal = document.getElementById("videoModal");
// var modalImage = document.getElementById("modalImage");
// var videoIframe = document.getElementById("videoIframe");
// var vidLink = document.querySelectorAll(".vid-link");

// videoModal.addEventListener("hidden.bs.modal", function() {
//   // When the modal is hidden (closed), stop the video by setting the src to an empty value
//   videoIframe.src = "";
//   // modalImage.src = "";
// });


// function setVideo(videoLink) {
 

//   if (videoLink) {
//     videoIframe.src = videoLink;
//   }

// }

// function handleAnchorElement(handleElement){
//   if(handleElement){
//     // if this Function get value from Portfolio Link then
//     handleElement.addEventListener("click", function(event) {
//       event.preventDefault(); // Prevent the default link behavior
//       var hrefValue = this.getAttribute("href");
     
//       // Now you can use the hrefValue as needed, for example, passing it to the setVideo function
//       if(hrefValue){
//         setVideo(hrefValue);
//       }

//     });
//   }
// }

//   vidLink.forEach(function(portLink) {

//     if (portLink.tagName.toLowerCase() === 'a') {
//         // Call this function to handle the anchor element
//         handleAnchorElement(portLink);
//     }
//   });

// var vidLink = document.querySelectorAll(".vid-link");
// var facPri = document.getElementById('facPri');
// function replaceWithIframe(){
//   // Create an iframe element
//   var iframe = document.createElement('iframe');

//   // Set the src attribute with query parameters
//   // iframe.src = 'https://www.youtube.com/embed/cufZk7flEF4?autoplay=1&mute=1&loop=1&playlist=cufZk7flEF4';
//   iframe.src = 'https://www.youtube-nocookie.com/embed/udqSwz9vL4s?version=3&autoplay=1&loop=1&mute=1&controls=1&rel=0&fs=0&vq=hd720p60&color=white&iv_load_policy=3&playlist=udqSwz9vL4s';

//   // Set the id attribute
//   iframe.id = 'facPriIframe'; 
//   iframe.className = 'rounded-5 overflow-hidden'; 

//   // Set other attributes
//   iframe.frameBorder = '0';
//   iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
//   iframe.allowFullscreen = true;
//   iframe.loading = 'lazy';
//   if(facPri) {
//     facPri.innerHTML = '';
//     facPri.appendChild(iframe);
//   }

// }

var vidLink = document.querySelector(".vid-link");
    var facPri = document.getElementById('facPri');

    function replaceWithVideo() {
      // Get the video link href
      var videoHref = vidLink.getAttribute('href');

      // Create a video element
      var video = document.createElement('video');

      // Set the video attributes
      video.id = 'facPriVideo'; // Set the id attribute
      video.src = videoHref;
      video.autoplay = true;
      video.muted = true;
      video.loop = true;
      video.controls = true; // Add controls if needed
      video.className = 'rounded-5 overflow-hidden mw-100';

      // Clear facPri content and append the video
      if (facPri) {
        facPri.innerHTML = '';
        facPri.appendChild(video);
      }
    }

    // Event listener to replace the image with the video when the vid-link is clicked
    if(vidLink){
      vidLink.addEventListener('click', function(event) {
        event.preventDefault();
        replaceWithVideo();
      });
    }


});

window.addEventListener('load', function() {
  // Select all elements with the class 'alert-wrap'
  const alertElements = document.querySelectorAll('.alert-wrap');

  // Iterate through each element
  alertElements.forEach(alertElement => {
    // Check if the element also has the class 'active'
    if (alertElement.classList.contains('active')) {
      // Set a timeout for 3 seconds (3000 milliseconds)
      setTimeout(() => {
        // Remove the 'alert-wrap' class
        alertElement.classList.remove('active');
      }, 3000);
    }
  });

});

// document.addEventListener("DOMContentLoaded", function () {
// const accordionButtons = document.querySelectorAll('.select-department-btn ');
//   if(accordionButtons){
//       accordionButtons.forEach(button => {
//           button.addEventListener('click', function (event) {
//               event.preventDefault(); // Prevent the form from being submitted
  
//               const accordionItem = this.parentElement;
//               const isActive = accordionItem.classList.contains('active');
  
//               // Collapse all accordion items
//               document.querySelectorAll('.accordion-item').forEach(item => {
//                   item.classList.remove('active');
//               });
  
//               // Toggle the clicked accordion item
//               if (!isActive) {
//                   accordionItem.classList.add('active');
//               }
//           });
//       });
//   }
// });


var videoslider = new Swiper(
  '.video-slider', {
  direction: 'horizontal',
  // autoplay: {
  //   delay: 2000,
  //   disableOnInteraction: false,
  // },
  slidesPerView: 1,
  spaceBetween: 30,
  centeredSlides: true,
  loop: true,

  speed: 1000,

  pagination: {
    el: '.swiper-pagination-videoslider',
    clickable: true,
  },

  breakpoints: {
    768: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 1,
      spaceBetween: 1,

    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 1,

    },
  },
});

var subslide = new Swiper(
  '.sub-slider', {
  direction: 'horizontal',
  effect: 'fade', fadeEffect: { crossFade: true },
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  speed: 1500,

});

var tradeslide = new Swiper(
  '.trade-slider', {
  direction: 'horizontal',
  slidesPerView: 1,
  spaceBetween: 15,
  centeredSlides: false,

  pagination: {
    el: '.swiper-pagination-tradeslide',
    clickable: true,
  },
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  speed: 1500,

  breakpoints: {
    1024: {
      slidesPerView: 1,
      spaceBetween: 15,
    },
    1200: {
      slidesPerView: 1.5,
      spaceBetween: 30,
    },
  },


});

var reviewsSlider = new Swiper(
  '.reviews-slider', {
  direction: 'horizontal',
  slidesPerView: 1,
  spaceBetween: 10,
  centeredSlides: true,
  loop: true,
  // navigation: {
  // nextEl: '.swiper-button-next',
  // prevEl: '.swiper-button-prev'
  // },
  pagination: {
    el: '.swiper-pagination-reviews-slider',
    clickable: true,
  },
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  // speed: 1500,

  breakpoints: {
    1024: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 35,

    },
  },

});


var mountSlide = new Swiper(
  '.mountain-slider', {
  direction: 'horizontal',
  effect: 'fade', fadeEffect: { crossFade: true },
  slidesPerView: 1,
  spaceBetween: 0,
  // loop: true,
  autoplay: {
    //  delay: 2000,
    disableOnInteraction: false,
  },
  speed: 800,

});






var bearslider = new Swiper(
  '.bearslider', {
  direction: 'horizontal',
  effect: 'fade', fadeEffect: { crossFade: true },
  slidesPerView: 1,
  spaceBetween: 0,
  // loop: true,
  autoplay: {
    //  delay: 2000,
    disableOnInteraction: false,
  },
  speed: 800,

});

var indicesSlide = new Swiper(
  '.indices-slider', {
  direction: 'horizontal',
  effect: 'fade', fadeEffect: { crossFade: true },
  slidesPerView: 1,
  spaceBetween: 0,
  // loop: true,
  autoplay: {
    //  delay: 2000,
    disableOnInteraction: false,
  },
  speed: 800,

});


var orbitslider = new Swiper(
  '.orbitslider', {
  effect: 'fade', fadeEffect: { crossFade: true },
  slidesPerView: 1,
  spaceBetween: 0,
  // loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  speed: 800,

});



document.addEventListener('DOMContentLoaded', (event) => {
  const myOffcanvas = document.getElementById('offcanvasRight');
  const htmlWrapper = document.querySelector('html');
  const sideClose = document.querySelectorAll('.side-menu-close');

  if (myOffcanvas && htmlWrapper && sideClose) {
    myOffcanvas.addEventListener('show.bs.offcanvas', event => {
      htmlWrapper.classList.add('overflow-hidden');

      sideClose.forEach(item => {
        item.classList.add('closed');
      });

    });

    myOffcanvas.addEventListener('hide.bs.offcanvas', event => {
      htmlWrapper.classList.remove('overflow-hidden');
      sideClose.forEach(item => {
        item.classList.remove('closed');
      });
    });
  } else {
    console.error('Element(s) not found: #myOffcanvas or .wrapper');
  }
});
