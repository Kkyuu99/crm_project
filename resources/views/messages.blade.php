@if(session('success'))
    <div id="success-message" class="popup-message bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div id="error-message" class="popup-message bg-red-100 text-red-700 px-4 py-2 rounded-md mb-4">
        {{ session('error') }}
    </div>
@endif

<script>
    window.onload = function() {
        const successMessage = document.getElementById('success-message');
        const errorMessage = document.getElementById('error-message');

        if (successMessage) {
                
            setTimeout(function() {
                successMessage.classList.add('show');
            }, 100);

            setTimeout(function() {
                successMessage.classList.add('hidden');
            }, 3000);
        }

        if (errorMessage) {

            setTimeout(function() {
                errorMessage.classList.add('show');
            }, 100);
            
            setTimeout(function() {
                errorMessage.classList.add('hidden');
            }, 3000);
        }
    };
</script>