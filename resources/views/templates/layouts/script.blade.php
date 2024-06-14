<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts/forms/switch.min.js') }}" type="text/javascript"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
{{-- <script src="{{ asset('assets/vendors/js/charts/chartist.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/charts/chartist-plugin-tooltip.min.js') }}" type="text/javascript">
</script> --}}

<script src="{{ asset('assets/vendors/js/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/js/core/app-menu.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts/customizer.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/jquery.sharrre.js') }}" type="text/javascript"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
{{-- <script src="{{ asset('assets/js/scripts/pages/dashboard-analytics.min.js') }}" type="text/javascript"></script> --}}
<script src="{{ asset('assets/vendors/js/forms/tags/form-field.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts/forms/custom-file-input.min.js') }}"></script>

{{-- <script src="{{ asset('assets/js/scripts/forms/wizard-steps.min.js') }}" type="text/javascript"></script> --}}

<!-- END: Page JS-->

{{-- FOR EXPORT --}}
<script src="{{ asset('assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts/tables/datatables/datatable-basic.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}" type="text/javascript">
</script>

<script src="{{ asset('assets/vendors/js/tables/buttons.flash.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/tables/jszip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/tables/pdfmake.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/tables/vfs_fonts.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/tables/buttons.html5.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/js/tables/buttons.print.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts/tables/datatables/datatable-advanced.min.js') }}" type="text/javascript">
</script>
{{-- END --}}

<script>
    $(document).ready(function() {
        $('#showPassword').click(function() {
            const passwordInput = $('#inputPassword');
            const passwordFieldType = passwordInput.attr('type');

            if (passwordFieldType === 'password') {
                passwordInput.attr('type', 'text');
                $('#showPassword i').removeClass('ft-eye').addClass('ft-eye-off');
            } else {
                passwordInput.attr('type', 'password');
                $('#showPassword i').removeClass('ft-eye-off').addClass('ft-eye');
            }
        });
    });
</script>