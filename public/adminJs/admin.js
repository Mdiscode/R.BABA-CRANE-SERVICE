
//update the card Data list
$(document).ready(function () {
  // Open Modal
  // $(document).on("mouseenter",'.editbtn',function(){
  // let id= $(this).val();
  
    // alert('hello');
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
  
  // --side menu--dropdown--company list
  $(document).ready(function(){
    $('.sub-btn').on("click",function(){
      $(this).next('.sub-menu').slideToggle();
      $(this).find('.dropdown1').toggleClass('transform: rotate(90deg)');
      // alert('hello');
    });
  });


  
  // claculate the time 
  function calculateTimeDifference(startTime, endTime) {
    // Parse the times in "HH:mm" format
    const start = startTime.split(":");
    const end = endTime.split(":");

    // Convert hours and minutes to minutes
    const startMinutes = parseInt(start[0]) * 60 + parseInt(start[1]);
    const endMinutes = parseInt(end[0]) * 60 + parseInt(end[1]);

    // Calculate the difference in minutes
    let totalMinutes = endMinutes - startMinutes;

    // Convert minutes to hours and remaining minutes
    const hours = Math.floor(totalMinutes / 60);
    const minutes = totalMinutes % 60;

    return { hours, minutes };
}
  // Function to update the total time input
  function updateTotalTime() {
    const intime = document.getElementById('intime').value;
    const outtime = document.getElementById('outtime').value;

    if (intime && outtime) {
        const result = calculateTimeDifference(intime, outtime);
        document.getElementById('totaltime').value = `${result.hours} hours and ${result.minutes} minutes`;
    } else {
        document.getElementById('totaltime').value = "";
    }
}

// Attach onchange event to inputs
document.getElementById('intime').addEventListener('change', updateTotalTime);
document.getElementById('outtime').addEventListener('change', updateTotalTime);


// // ----start modal---
// $(document).ready(function(){
  
// $('[data-modal-target]').on('click', function () {
//   const target = $(this).data('modal-target');
//   $(target).removeClass('hidden').addClass('flex');
// });

// // Close Modal
// $('[data-modal-close]').on('click', function () {
//   const target = $(this).data('modal-close');
//   $(target).removeClass('flex').addClass('hidden');
// });
// // Close modal on outside click
// $(document).on('click', function (e) {
// const modal = $('.modal.flex'); // Only visible modal
// if (
//   modal.length &&
//   $(e.target).closest(`${modal.selector} > div`).length === 0 &&
//   !$(e.target).is('[data-modal-target]')
// ) {
//   modal.removeClass('flex').addClass('hidden');
// }
// });
// // // ---end-modal---
// });
 

  