{/* <script> */}
    
// ---view the company data---start--
$(document).ready(function () {
  let viewcmp = $('#ViewCmpyModal');

  if (viewcmp.length) {
      viewcmp.on('show.bs.modal', function (event) {
          var btn = $(event.relatedTarget);
          var vid = btn.data('bs-viewid');
          // $('#viewcmpName').text(vid); // Uncomment if you need to set the value in an element
          $.ajax({
            url: `/api/apicompany/${vid}`,
            type: "GET",
            dataType: "json",
            success: function(response) {
                $(".cmpValue").empty(); // Clear previous data
                // console.log(response.data.cmpyData[0]);
                let data = response.data.cmpyData[0];
                $('#viewcmpName').text(data.companyname);
                $('#viewcmpAddress').text(data.address);
                $('#viewcmpGaadino').text(data.gaadino);
                $('#viewcmpEmail').text(data.email);
                $('#viewcmpPhone').text(data.phone);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
      });
  }
});

// --view the company data.a end--

///--fetch the company data in the form---start
//open single post model
document.addEventListener("DOMContentLoaded", function () {
    let updateCompany = document.querySelector("#UpdateCmpyModal");

    if (updateCompany) {
        updateCompany.addEventListener("show.bs.modal", function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            var id = button.getAttribute("data-bs-cmpyId"); // Fetch ID from data attribute

            // Set company ID in the form field
            document.getElementById("cid").value = id;

            // Fetch the API token from local storage (if needed)
            // const token = localStorage.getItem("api_token");

            // Fetch company details using API
            fetch(`/api/apicompany/${id}` , {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    // "Authorization": `Bearer ${token}`, // Include token if needed
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        let cmpyData = data.data.cmpyData[0]; // Extract company data
                        console.log(cmpyData);

                        // Populate form fields with company data
                        document.getElementById("cmpyName").value = cmpyData.companyname || "";
                        document.getElementById("cmpyAddress").value = cmpyData.address || "";
                        document.getElementById("gaadiNo").value = cmpyData.gaadino || "";
                        document.getElementById("cmpyEmail").value = cmpyData.email || "";
                        document.getElementById("cmpyPhone").value = cmpyData.phone || "";
                    } else {
                        console.error("Error fetching company data:", data.message);
                    }
                })
                .catch((error) => console.error("Fetch error:", error));
        });
       }
});
///end

    //....Update  the company data...
    let updatecmp = document.querySelector('#updatecompany');
     updatecmp.onsubmit = async (e) => {
     e.preventDefault();
      // Clear previous errors
    document.querySelectorAll('.error-message').forEach(span => span.textContent = '');
  const uid = document.getElementById('cid').value;
  const data = {
    companyname: document.getElementById('cmpyName').value,
    address: document.getElementById('cmpyAddress').value,
    gaadino: document.getElementById('gaadiNo').value,
    email: document.getElementById('cmpyEmail').value,
    phone: document.getElementById('cmpyPhone').value
  };

  try {
    let response = await fetch(`/api/apicompany/${uid}`, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
      },
      body: JSON.stringify(data),
    });


  //errro
  if (response.status === 422) {
            const result = await response.json();
            if (!result.success) {
                // displayValidationErrors(result.errors);
                console.log(result.errors.companyname);
                // let name = result.errors.companyname;
                document.getElementById('errorname').innerHTML= result.errors.companyname;
                document.getElementById('error-address').innerHTML= result.errors.address;
                document.getElementById('error-gadino').innerHTML= result.errors.gaadino;
                document.getElementById('error-email').innerHTML= result.errors.email;
                document.getElementById('error-phone').innerHTML= result.errors.phone;
                
            }
        } else if (response.ok) {
            const result = await response.json();
            console.log('Company updated successfully:', result);
            alert(result.message);
            window.location.href = "/company/viewCompany";
        } else {
            console.error(`Unexpected error: ${response.status}`);
        }
    } catch (error) {
        console.error('Fetch error:', error);
    }
};
    
  
//----Delete the company data with Sweet-Alert-----//
async function deletecmp(cmpid) {
  // Show confirmation dialog
  let deleteConfirm = await swal({
      title: "Are you sure?",
      text: "You won't be able to revert this action!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  });

  if (deleteConfirm) { // If user confirms deletion
      try {
          let response = await fetch(`/api/apicompany/${cmpid}`, {
              method: "DELETE",
              headers: {
                  "Content-Type": "application/json"
              }
          });

          let result = await response.json();
          console.log(result);

          // Show success message & reload page
          await swal("Deleted!", "The company has been deleted.", "success");
          window.location.href = "http://127.0.0.1:8000/company/viewCompany";

      } catch (error) {
          console.error("Error deleting company:", error);
          swal("Error!", "Something went wrong.", "error");
      }
  } else {
      swal("Cancelled", "Your data is safe!", "info");
  }
}

    



{/* </script> */}