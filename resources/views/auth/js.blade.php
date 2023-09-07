<!-- Adon Scripts -->
<!-- Core -->
<script src="/assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="/assets/js/popper.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/plugins/toastr/toastr.min.js"></script>

<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- https://codepen.io/riyos94/pen/NXgXdp -->
<script type="text/javascript">
    $(document).ready(function(){
        toastr.options = {
            'closeButton': true,
            'debug': false,
            'newestOnTop': false,
            'progressBar': false,
            'positionClass': 'toast-top-right',
            'preventDuplicates': false,
            'showDuration': '1000',
            'hideDuration': '1000',
            'timeOut': '5000',
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut',
            'progressBar': true,
        }
    });
    var verifyCallback = function(response) {
        alert(response);
    };

    // $("#tabs-icons-text-1-tab").click(function() {
    //     toastr.info('You clicked Brand type!');
    // });

    // $("#tabs-icons-text-2-tab").click(function() {
    //     toastr.info('You clicked Influencer type!');
    // });
</script>

@if(isset($authFail))
<script type="text/javascript">
    toastr.error('{{ __('auth.authFail') }}');
</script>
@endif

@error('email')
<script type="text/javascript">
    toastr.error('{{$message}}');
</script>
@enderror

@error('name')
<script type="text/javascript">
    toastr.error('{{$message}}');
</script>
@enderror

@error('password')
<script type="text/javascript">
    toastr.error('{{$message}}');
</script>
@enderror

@error('member_activate')
<script type="text/javascript">
    toastr.error('{{$message}}');
</script>
@enderror

@error('g-recaptcha-response')
<script type="text/javascript">
    toastr.error('{{$message}}');
</script>
@enderror

@error('remember_token')
<script type="text/javascript">
    toastr.error('{{$message}}');
</script>
@enderror

@if (session('register_success'))
<script type="text/javascript">
    toastr.success('{{ __('auth.registerSuccess') }}');
</script>
@endif

@if (session('verify_success'))
<script type="text/javascript">
    toastr.success('{{ __('auth.verifySuccess') }}');
</script>
@endif

@if (session('verify_fail'))
<script type="text/javascript">
    toastr.fail('{{ __('auth.verifyFail') }}');
</script>
@endif

@if (session('reset_mail'))
<script type="text/javascript">
    toastr.success('{{ __('auth.resetMail') }}');
</script>
@endif

@if (session('reset_success'))
<script type="text/javascript">
    toastr.success('{{ __('auth.resetSuccess') }}');
</script>
@endif

@if (session('reset_fail'))
<script type="text/javascript">
    toastr.error('{{ __('auth.resetFail') }}');
</script>
@endif

@if(isset($error) && $error == 'resend_error'))
<script type="text/javascript">
    toastr.error('{{ __('auth.resendError') }}');
</script>
@endif






