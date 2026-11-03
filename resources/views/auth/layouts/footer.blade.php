 <!-- jQuery -->
 <script src="{{ url('auth/assets/jquery/jquery.min.js') }}"></script>
 <!-- Page specific script -->
 <!-- Bootstrap 4 -->
 <script src="{{ url('auth/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- jquery-validation -->
 <script src="{{ url('auth/assets/jquery-validation/jquery.validate.min.js') }}"></script>
 <script src="{{ url('auth/assets/jquery-validation/additional-methods.min.js') }}"></script>
 <!-- Bootstrap 4 -->
 <script src="{{ url('auth/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- AdminLTE App -->
 <script src="{{ url('auth/assets/js/adminlte.min.js') }}"></script>
 <!-- Include Inputmask library -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>

 <script>
     $(function() {
         $('#quickForm').validate({
             rules: {
                 hei_name: {
                     required: true,
                 },
                 rep_name: {
                     required: true,
                 },
                 rep_designation: {
                     required: true,
                 },
                 email: {
                     required: true,
                     email: true,
                 },
                 email_confirmation: {
                     required: true,
                     equalTo: "#email"
                 },
                 rep_phone: {
                     required: true,
                     minlength: 11,
                 },
                 rep_sec_phone: {
                     required: true,
                     minlength: 11,
                 },
                 password: {
                     required: true,
                     minlength: 5,
                 },
                 password_confirmation: {
                     required: true,
                     minlength: 5,
                     equalTo: "#password"
                 },
                 terms: {
                     required: true
                 },
             },
             messages: {
                 hei_name: {
                     required: "Please enter the Higher Education Institution Name",
                 },
                 rep_name: {
                     required: "Please enter the Representative Name",
                 },
                 rep_designation: {
                     required: "Please enter the Representative Designation",
                 },
                 email: {
                     required: "Please enter an email address",
                     email: "Please enter a valid email address"
                 },
                 email_confirmation: {
                     required: "Please enter an email address",
                     equalTo: "Email confirmation must match the email"
                 },
                 rep_phone: {
                     required: "Please enter the primary phone number",
                     minlength: "Minimum length for phone number is 11"
                 },
                 rep_sec_phone: {
                     required: "Please enter the secondary phone number",
                     minlength: "Minimum length for phone number is 11"
                 },
                 password: {
                     required: "Please provide a password",
                     minlength: "Your password must be at least 5 characters long"
                 },
                 password_confirmation: {
                     required: "Please provide a password confirmation",
                     minlength: "Your password confirmation must be at least 5 characters long",
                     equalTo: "Password confirmation must match the password"
                 },
                 terms: "Please accept our terms and conditions"
             },
             errorElement: 'span',
             errorPlacement: function(error, element) {
                 error.addClass('invalid-feedback');
                 element.closest('.input-group').append(error);
             },
             highlight: function(element, errorClass, validClass) {
                 $(element).addClass('is-invalid');
             },
             unhighlight: function(element, errorClass, validClass) {
                 $(element).removeClass('is-invalid');
             },
         });

         // validation for phone number fields
         $(document).ready(function() {
             $('#quickForm input[name="rep_phone"], #quickForm input[name="rep_sec_phone"]').on('input',
                 function() {
                     var value = $(this).val().replace(/\D/g, ''); // Remove non-digit characters
                     if (value.length > 11) {
                         value = value.slice(0, 11); // Limit to 11 digits
                     }
                     $(this).val(value);
                 });
         });
     });
 </script>

 <!-- SweetAlert2 -->
 <script src="{{ url('admin/vendor/sweetalert2/sweetalert2.min.js') }}"></script>
 <!-- Page specific script -->
 <script>
     $(function() {
         var Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000
         });

         $('.swalDefaultSuccess').click(function() {
             Toast.fire({
                 icon: 'success',
                 title: 'Congratulations, accouaaaaaaaaaaaaaaant created successfully.'
             })
         });
         $('.swalDefaultInfo').click(function() {
             Toast.fire({
                 icon: 'info',
                 title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.swalDefaultError').click(function() {
             Toast.fire({
                 icon: 'error',
                 title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.swalDefaultWarning').click(function() {
             Toast.fire({
                 icon: 'warning',
                 title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
         $('.swalDefaultQuestion').click(function() {
             Toast.fire({
                 icon: 'question',
                 title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
             })
         });
     });
 </script>

 <script>
     $(document).ready(function() {
         var Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000
         });

         // Trigger the toast automatically when the page loads
         @if (session('success'))
             Toast.fire({
                 icon: 'success',
                 title: '{{ session('success') }}'
             });
         @endif

         @if (session('error'))
             Toast.fire({
                 icon: 'error',
                 title: '{{ session('error') }}'
             });
         @endif
     });
 </script>

 </body>

 </html>
