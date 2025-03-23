//--Menu-js--close-open--start
function Menu(e) {
    const list = document.querySelector('ul');
    const closeIcon = document.getElementById('close-icon');
    const menuIcon = document.getElementById('menu-icon');

    // Add classes to show the menu
    list.classList.add('left-[-3%]','opacity-100');

    // Show the close icon and hide the menu icon
    closeIcon.classList.remove('hidden');
    menuIcon.classList.add('hidden');
}

function Close(e) {
    const list = document.querySelector('ul');
    const closeIcon = document.getElementById('close-icon');
    const menuIcon = document.getElementById('menu-icon');

    // Remove classes to hide the menu
    list.classList.remove('left-[-3%]','opacity-100');

    // Show the menu icon and hide the close icon
    closeIcon.classList.add('hidden');
    menuIcon.classList.remove('hidden');
}

        //active the menu
// Get all menu items
const menuItems = document.querySelectorAll('a');

// Add event listeners to each menu item
menuItems.forEach(item => {
  item.addEventListener('click', () => {
    // Remove 'active' class from all menu items
    menuItems.forEach(menu => menu.classList.remove('bg-orange-400','text-white'));
    
    // Add 'active' class to the clicked item
    item.classList.add('bg-orange-400','text-white');
  });
});

//--Menu-js--close-open--end


//--slider-js--start
var swiper = new Swiper(".mySwiper", {
  spaceBetween: 60,
  centeredSlides: true,
  autoplay: {
    delay: 13000,  // 10 seconds delay 10000
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

//   --slider end---


//--login-model-start--
// $(document).ready(function() {
//     // Open Modal
//     $('#openModal').on('click', function() {
//       $('#myModal').removeClass('hidden').addClass('flex');
//     });

//     // Close Modal
//     $('#closeModal, #closeModalFooter').on('click', function() {
//       $('#myModal').removeClass('flex').addClass('hidden');
//     });

//     // Close modal on outside click
//     $(document).on('click', function(e) {
//       if ($(e.target).closest('#myModal > div').length === 0 && !$(e.target).is('#openModal')) {
//         $('#myModal').removeClass('flex').addClass('hidden');
//       }
//     });
//   });

//   //login---model--end---

// //   ---contact--model---start-
// $(document).ready(function() {
//     // Open Modal
//     $('#openModelCon').on('click', function() {
//       // alert("hello");
//       $('#myModalcon').removeClass('hidden').addClass('flex');
//     });

//     // Close Modal
//     $('#closeModalcon, #closeModalFootercon').on('click', function() {
//       $('#myModalcon').removeClass('flex').addClass('hidden');
//     });

//     // Close modal on outside click
//     $(document).on('click', function(e) {
//       if ($(e.target).closest('#myModalcon > div').length === 0 && !$(e.target).is('#openModelCon')) {
//         $('#myModalcon').removeClass('flex').addClass('hidden');
//       }
//     });
//   });
  
//    ----contact--model-- end--


///demo
$(document).ready(function () {
  // Open Modal
  $('[data-modal-target]').on('click', function () {
    const target = $(this).data('modal-target');
    $(target).removeClass('hidden').addClass('flex');
  });

  // Close Modal
  $('[data-modal-close]').on('click', function () {
    const target = $(this).data('modal-close');
    $(target).removeClass('flex').addClass('hidden');
  });

  // Close modal on outside click
  $(document).on('click', function (e) {
    const modal = $('.modal.flex'); // Only visible modal
    if (
      modal.length &&
      $(e.target).closest(`${modal.selector} > div`).length === 0 &&
      !$(e.target).is('[data-modal-target]')
    ) {
      modal.removeClass('flex').addClass('hidden');
    }
  });
});
