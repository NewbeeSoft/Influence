<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- Adon Scripts -->
<!-- Core -->
<script src="/assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="/assets/js/popper.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Optional JS -->
<script src="/assets/plugins/chart.js/dist/Chart.min.js"></script>
<script src="/assets/plugins/chart.js/dist/Chart.extension.js"></script>

<!-- Data tables -->
<script src="/assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>

<!-- Fullside-menu Js-->
<script src="/assets/plugins/toggle-sidebar/js/sidemenu.js"></script>

<!-- file uploads js -->
<script src="/assets/plugins/fileuploads/js/dropify.min.js"></script>

<!-- Custom scroll bar Js-->
<script src="/assets/plugins/customscroll/jquery.mCustomScrollbar.concat.min.js"></script>

<!--Select2 js-->
<script src="/assets/plugins/select2/select2.full.js"></script>

<script src="/assets/plugins/toastr/toastr.min.js"></script>

<!-- Adon JS -->
<script src="/assets/js/custom.js"></script>

<script type="text/javascript">
    var fbToken = '';
    var fbUserId = '';

    var _countryId = '{{$profile->country_id ?? ''}}';
    toastr.options = {
        //'closeButton': true,
        'debug': false,
        'newestOnTop': false,
        'positionClass': 'toast-top-right',
        'preventDuplicates': false,
        'showDuration': '1000',
        'hideDuration': '1000',
        'timeOut': '115000',
        'extendedTimeOut': '1000',
        'showEasing': 'swing',
        'hideEasing': 'linear',
        'showMethod': 'fadeIn',
        'hideMethod': 'fadeOut',
        'progressBar': true,
    }
    $(document).ready(function(){
        // ______________File Uploads
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (2M max).'
            }
        });



        $.ajaxSetup ({ cache : true });

        $.ajax(
            {
                url: 'https://restcountries.eu/rest/v2/all',
                type: 'get',
                success: function(response){
                    console.log(response);
                    var countryHtml = '<option value="000">&nbsp;</option>';
                    for(i=0;i<response.length;i++){
                        country = response[i];
                        countryHtml+='<option value="'+country.numericCode+'"'+(_countryId == country.numericCode ? 'selected' : null)+'>'+country.name+'</option>';
                    }
                    $('#country').html(countryHtml);
                    $('.select2').select2();
                },
                error: function(request, error){

                }
            }
        );

        $.getScript (
            'https://connect.facebook.net/en_US/sdk.js' ,
            function () {
                FB.init ({
                    appId : '{{$appId}}' ,
                    version : 'v2.7' // or v2.1, v2.2, v2.3, ...
                });
                //$ ( '# loginbutton, # feedbutton' ). removeAttr ( 'disabled' );
                FB.getLoginStatus (
                    function(response) {

                        console.log(response);
                    }
                );
            }
        );


    });

    function fbBasic(response){
        console.log(response);
        if(response.status == 'connected'){
            fbConnectApi(response.authResponse.userID, response.authResponse.accessToken);
        }else if(response.status == 'not_authorized'){

        }else if(response.status == 'unknown'){

        }
    }

    function fbConnectApi(userId, accessToken){
        $.ajax(
            {
                url: '/verify/auth/facebook/',
                type: 'POST',
                headers:{
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    userId: userId,
                    accessToken: accessToken
                },
                success: function(response){
                    console.log(response);
                    if(response.status){
                        toastr.success('Your action success!');
                        setTimeout(() => {
                            window.location.replace('/profile/edit');
                        }, 2000);
                    }else{
                        toastr.success('Your action fail!');
                    }
                },
                error: function(request, error){
                    alert("Request: "+JSON.stringify(request));
                }
            }
        );
    }

    function fbLogin(){
        FB.getLoginStatus (
            function(response) {
                if(response.status == 'connected'){
                    fbConnectApi(response.authResponse.userID, response.authResponse.accessToken);
                }else if(response.status == 'not_authorized'){
                    FB.login(function(response){
                        fbBasic(response);
                    }, {scope: 'public_profile,email,instagram_basic,pages_show_list,pages_read_engagement'});
                }else if(response.status == 'unknown'){
                    FB.login(function(response){
                        fbBasic(response);
                    }, {scope: 'public_profile,email,instagram_basic,pages_show_list,pages_read_engagement'});
                }
            }
        );

    }
</script>

{{-- @if($instagramLink == false)
<script type="text/javascript">
toastr.warning('Must link instagram');
</script>
@endif --}}

@if (session('instagram_fail'))
<script type="text/javascript">
    toastr.success('{{ __('auth.instagramFail') }}');
</script>
@endif

@if (session('instagram_success'))
<script type="text/javascript">
    toastr.success('{{ __('auth.instagramSuccess') }}');
</script>
@endif




@if($instagramLink == false)
<script type="text/javascript">
    $(document).ready(function(){
        $('#social-link-notification').modal('show');
    });
</script>
@endif

{{-- <div id = "fb-root" >
     </ div> <script async defer crossorigin = "anonymous" src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId= 397069834542225 & autoLogAppEvents = 1 " nonce = " Qpuc0hrp " > </script>  --}}


