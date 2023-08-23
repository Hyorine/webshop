<!-- Bootstrap Login and Registration Modal Trigger -->
<div>
    <div>
        <a href="#" data-toggle="modal" data-target="#loginAndRegistrationModal" style="color: #fff;">{{ __('messages.logReg') }}</a>
    </div>
    <div class="alert-danger">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div id="successMessage" style="display: none;">
         {{ __('messages.SuccesReg') }}
    </div>
</div>

<!-- Bootstrap Login and Registration Modal -->
<div class="modal fade" id="loginAndRegistrationModal" tabindex="-1" role="dialog" aria-labelledby="loginAndRegistrationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-tabs" id="loginAndRegistrationTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">{{ __('messages.Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="registration-tab" data-toggle="tab" href="#registration" role="tab" aria-controls="registration" aria-selected="false">{{ __('messages.Regisztration') }}</a>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content" id="loginAndRegistrationTabsContent">
                    <!-- Login Form -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form method="POST" action="{{ route('login') }}" >
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('messages.Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('messages.Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('messages.RememberMe') }}
                                </label>
                            </div>

                            <button type="submit" class="btn btn-light">{{ __('messages.Login') }}</button>
                        </form>
                    </div>

                    <!-- Registration Form -->
                    <div class="tab-pane fade" id="registration" role="tabpanel" aria-labelledby="registration-tab">
                        <form method="POST" action="/Registration" onsubmit="validateLoginForm(event);">
                            @csrf
                            <div class="form-group">
                                <label for="registrationEmail">{{ __('messages.Email') }}</label>
                                <input type="email" name="email" id="RegemailInput" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('messages.Password') }}</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="regpasswordInput" class="form-control" minlength="8" maxlength="16" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input type="checkbox" onclick="togglePasswordVisibility()"> {{ __('messages.Show') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-light">{{ __('messages.Regisztration') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function validateLoginForm() {
        event.preventDefault(); // Prevent form submission by default

        var emailInput = document.getElementById("RegemailInput");
        var passwordInput = document.getElementById("regpasswordInput");

        // Check if email and password fields are filled
        if (emailInput.value.trim() === "" || passwordInput.value.trim() === "") {
            alert("Please fill in all the required fields.");
            return;
        }
          // Check password format (minimum 8 and maximum 16 characters with a mix of uppercase and lowercase letters, numbers, and special characters)
          var passwordFormatRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/;
        if (!passwordFormatRegex.test(passwordInput.value)) {
            alert("Password must be between 8 and 16 characters and include at least one uppercase letter, one lowercase letter, one number, and one special character (@, $, !, %, *, ?, &).");
            return;
        }

        // If all validations pass, submit the form
        submitRegistrationForm();
      
 }
function togglePasswordVisibility() {
        var passwordInput = document.getElementById("passwordInput");
        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
}
function hideErrorMessages() {
      // Find all elements with the 'alert-danger' class
      const errorAlerts = document.querySelectorAll('.alert-danger');
        
        // Check if there are any error messages before proceeding
        if (errorAlerts.length > 0) {
            // Show the error messages initially
            errorAlerts.forEach(alert => alert.style.display = 'block');

            // Hide all elements with the 'alert-danger' class after 1 minute (60000 milliseconds)
            setTimeout(function() {
                errorAlerts.forEach(alert => alert.style.display = 'none');
            }, 60000);
        } else {
            // If there are no error messages, don't show them at all
            errorAlerts.forEach(alert => alert.style.display = 'none');
        }
}
function submitRegistrationForm() {
       
       // Get the form data
       const formData = new FormData(event.target);

       // Make an AJAX request to the registration route
       fetch('/Registration', {
           method: 'POST',
           body: formData
       })
       .then(response => response.json())
        .then(data => {
            if (data.message === 'success') {
                // Show the success message
                document.getElementById('successMessage').style.display = 'block';
                // Hide the success message after 1 minute (60000 milliseconds)
                setTimeout(function() {
                    document.getElementById('successMessage').style.display = 'none';
                }, 60000);
                
                const modal = document.getElementById('loginAndRegistrationModal');
                if (modal) {
                    modal.classList.remove('show');
                    modal.style.display = 'none';
                    document.body.classList.remove('modal-open');
                    document.body.style.paddingRight = '0';
                    const modalBackdrop = document.querySelector('.modal-backdrop');
                    if (modalBackdrop) {
                        modalBackdrop.remove();
                    }
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
    // Call the function when the document is ready
    document.addEventListener('DOMContentLoaded', hideErrorMessages);
</script>