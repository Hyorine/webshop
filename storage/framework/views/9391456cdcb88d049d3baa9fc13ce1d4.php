<!-- Bootstrap Login and Registration Modal Trigger -->
<div>
    <div>
        <a href="#" data-toggle="modal" data-target="#loginAndRegistrationModal" style="color: #fff;"><?php echo e(__('Login / Registration')); ?></a>
    </div>
    <div class="alert-danger">
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div id="successMessage" style="display: none;">
         <?php echo e(__('messages.SuccesReg')); ?>

    </div>
</div>

<!-- Bootstrap Login and Registration Modal -->
<div class="modal fade" id="loginAndRegistrationModal" tabindex="-1" role="dialog" aria-labelledby="loginAndRegistrationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-tabs" id="loginAndRegistrationTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true"><?php echo e(__('Login')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="registration-tab" data-toggle="tab" href="#registration" role="tab" aria-controls="registration" aria-selected="false"><?php echo e(__('messages.Regisztration')); ?></a>
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
                        <form method="POST" action="<?php echo e(route('login')); ?>" >
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="email"><?php echo e(__('messages.Email')); ?></label>
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password"><?php echo e(__('messages.Password')); ?></label>
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="remember">
                                    <?php echo e(__('Remember Me')); ?>

                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary"><?php echo e(__('Login')); ?></button>
                        </form>
                    </div>

                    <!-- Registration Form -->
                    <div class="tab-pane fade" id="registration" role="tabpanel" aria-labelledby="registration-tab">
                        <form method="POST" action="/Registration" onsubmit="validateLoginForm(event);">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="registrationEmail"><?php echo e(__('messages.Email')); ?></label>
                                <input type="email" name="email" id="RegemailInput" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password"><?php echo e(__('messages.Password')); ?></label>
                                <div class="input-group">
                                    <input type="password" name="password" id="regpasswordInput" class="form-control" minlength="8" maxlength="16" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input type="checkbox" onclick="togglePasswordVisibility()"> <?php echo e(__('messages.Show')); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary"><?php echo e(__('Register')); ?></button>
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
               $('#loginAndRegistrationModal').modal('hide');
           }
       })
       .catch(error => {
           console.error('Error:', error);
       });
}
    // Call the function when the document is ready
    document.addEventListener('DOMContentLoaded', hideErrorMessages);
</script><?php /**PATH /home/vagrant/code/AH/resources/views/unloginmenu2.blade.php ENDPATH**/ ?>