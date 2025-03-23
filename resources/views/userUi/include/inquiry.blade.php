{{-- 
<!-- The Modal -->
<div 
  id="inquiryModel" 
  class="fixed z-[3] top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 hidden justify-center items-center">

  <div class="bg-white mx-w-lg sm:w-[40rem]  rounded-lg shadow-lg px-0 py-0 relative ">
    <!-- Modal Header -->
      
    <button data-modal-close="#inquiryModel"  id="closeinquiryModel" class="text-gray-500 hover:text-gray-700 absolute top-0 right-6" style="font-size:2.5rem;">&times;</button>
    <!-- Modal Body -->
    <div class=" text-gray-600 flex w-full h-full justify-center">


        <div class="max-w-full sm:w-[38rem]  p-6 bg-white rounded-lg shadow-md ">
            <div class=" w-full text-center mb-10 ">
              <p class=" text-2xl sm:text-lg font-bold text-center text-gray-700">Enter Requirement Details
              </p>
              
            </div>
            <form id="inquiryForm" method="post" action="{{ route('user.inquiry') }}">
          
             @csrf
              <div class="mb-4 w-full">
                <textarea class="rounded-lg w-full text-gray-600" row="3" placeholder="Enter your requirement like Farana,Hydra ,Towing,Forkillift,Mobile crane" name="inquiry"></textarea>
                <span id="inquiryError" style="color:red"></span>
              </div>
            
              <div class="flex flex-col sm:flex-row gap-4 justify-center items-center w-full">
                <div class="mb-4 w-full">
                  <input  name="emailin" type="email" 
                    class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Email Id">
                  <span id="emailError" style="color:red"></span>
                </div>

                <div class="mb-4 w-full">
                  <input  name="phonein" type="text" 
                    class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Phone Number" >
                  <span id="phoneError" style="color:red"></span>
                </div>

                
              </div>
              
              
              
              <div>
                <button id="submitInquiry"
                  type="submit" 
                  class="w-full px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                  Enquire
                </button>
              </div>
            </form>
          </div>
          
    </div>

  </div>
</div>

<script>
  $(document).ready(function(){
    $('#submitInquiry').on("click", function(event){
      event.preventDefault(); // Prevent form submission initially

      // Get input values
      let inquiry = $('textarea[name="inquiry"]').val().trim();
      let email = $('input[name="emailin"]').val().trim();
      let phone = $('input[name="phonein"]').val().trim();

      // Reset previous errors
      $('#inquiryError').text("").hide();
      $('#emailError').text("").hide();
      $('#phoneError').text("").hide();

      let isValid = true;

      // Validate Inquiry Field
      if (inquiry === '') {
        $('#inquiryError').text("This field is required.").show();
        isValid = false;
      }

      // Validate Email Field (Format Check)
      let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      if (!emailPattern.test(email)) {
        $('#emailError').text("Enter a valid email.").show();
        isValid = false;
      }

      // Validate Phone Field
      if (phone === '') {
        $('#phoneError').text("Phone number is required.").show();
        isValid = false;
      }

      // If all fields are valid, submit the form
      if (isValid) {
        $('#inquiryForm').submit(); // Submits the form
      }
    });
  });
</script> --}}



{{-- ----- --}}
<!-- The Modal -->
<div 
  id="inquiryModel" 
  class="fixed z-[3] top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 hidden justify-center items-center">

  <div class="bg-white mx-w-lg sm:w-[40rem] rounded-lg shadow-lg px-0 py-0 relative">
    <!-- Modal Header -->
    <button id="closeinquiryModel" class="text-gray-500 hover:text-gray-700 absolute top-0 right-6" 
      style="font-size:2.5rem;">&times;
    </button>

    <!-- Modal Body -->
    <div class="text-gray-600 flex w-full h-full justify-center">
        <div class="max-w-full sm:w-[38rem] p-6 bg-white rounded-lg shadow-md">
            <div class="w-full text-center mb-10">
              <p class="text-2xl sm:text-lg font-bold text-center text-gray-700">Enter Requirement Details</p>
            </div>

            <form id="inquiryForm" method="post" action="{{ route('user.inquiry') }}">
                @csrf

                <!-- Inquiry Input -->
                <div class="mb-4 w-full">
                  <textarea class="rounded-lg w-full text-gray-600" rows="3" id="inquiryInput" 
                    placeholder="Enter your requirement like Farana, Hydra, Towing, Forklift, Mobile crane" 
                    name="inquiry"></textarea>
                  <span id="inquiryError" class="text-red-500 hidden"></span>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center w-full">
                    <!-- Email Input -->
                    <div class="mb-4 w-full">
                      <input id="emailInput" name="email" type="email" 
                        class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Email Id">
                      <span id="emailError" class="text-red-500 hidden"></span>
                    </div>

                    <!-- Phone Input -->
                    <div class="mb-4 w-full">
                      <input id="phoneInput" name="phone" type="text" 
                        class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Phone Number">
                      <span id="phoneError" class="text-red-500 hidden"></span>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                  <button id="submitInquiry"
                    type="submit" 
                    class="w-full px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Enquire
                  </button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- JavaScript Validation -->
<script>
  $(document).ready(function(){
    $('#submitInquiry').on("click", function(event){
      event.preventDefault(); // Prevent form submission initially

      let isValid = true; // Assume the form is valid first

      // Get input values
      let inquiry = $('#inquiryInput').val().trim();
      let email = $('#emailInput').val().trim();
      let phone = $('#phoneInput').val().trim();

      // Reset previous errors
      $('#inquiryError').text("").addClass('hidden');
      $('#emailError').text("").addClass('hidden');
      $('#phoneError').text("").addClass('hidden');

      // Validate Inquiry Field
      if (inquiry === '') {
        $('#inquiryError').text("This field is required.").removeClass('hidden');
        isValid = false;
      }

      // Validate Email Field (Format Check)
      let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      if (!emailPattern.test(email)) {
        $('#emailError').text("Enter a valid email.").removeClass('hidden');
        isValid = false;
      }

      // Validate Phone Field (Only allow digits & must be 10 digits)
      let phonePattern = /^[0-9]{10}$/;
      if (!phonePattern.test(phone)) {
        $('#phoneError').text("Enter a valid 10-digit phone number.").removeClass('hidden');
        isValid = false;
      }

      // If all fields are valid, submit the form
      if (isValid) {
        $('#inquiryForm').submit(); // Submits the form
      }
    });

    // Close Modal on clicking "X" button
    $('#closeinquiryModel').on("click", function() {
        $('#inquiryModel').addClass('hidden');
    });
  });
</script>
