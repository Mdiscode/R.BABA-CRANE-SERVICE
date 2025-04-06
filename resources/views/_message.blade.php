@if (!@empty(session('success')))
    <div id="alert-message" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      
@endif

@if (!empty(session('errors')))
    <div id="alert-message" class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('errors')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    // Remove the message after 5 seconds
    setTimeout(function() {
        let alertBox = document.getElementById('alert-message');
        if (alertBox) {
            alertBox.style.transition = "opacity 0.5s ease-out";
            alertBox.style.opacity = "0";
            setTimeout(() => alertBox.remove(), 500); // Remove from DOM after fading
        }
    }, 5000); // 5000ms = 5 seconds
</script>

