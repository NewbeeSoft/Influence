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

{{-- <script src="/assets/js/bootstrap-multiselect.js"></script> --}}

<!--Range-sliders js-->
<script src="/assets/plugins/ion-rangeslider/ion.rangeSlider.min.js"></script>
<script src="/assets/js/ion-rangeslider.js"></script>

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


        // $.getScript (
        //     'https://connect.facebook.net/en_US/sdk.js' ,
        //     function () {
        //         FB.init ({
        //             appId : '{{$appId}}' ,
        //             version : 'v2.7' // or v2.1, v2.2, v2.3, ...
        //         });
        //         //$ ( '# loginbutton, # feedbutton' ). removeAttr ( 'disabled' );
        //         FB.getLoginStatus (
        //             function(response) {

        //                 console.log(response);
        //             }
        //         );
        //     }
        // );


    });

    function fbBasic(response){
        // console.log(response);
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
                    // console.log(response);
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



    $(function(e) {
        'use strict';
        $( "#location" ).select2({
            ajax: {
                url: "/data/search/location/list",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                delay: 0,
                method: 'POST',
                data: function (params) {
                    return {
                        q: params.term // search term
                    };
                },
                processResults: function (data) {
                    // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data
                    console.log(data)
                    // return {
                    //     results: data
                    // };
                    return {
                        results: $.map(data.predictions, function(obj) {
                            return { id: obj.description, text: obj.description };
                        })
                    };
                },
                cache: false
            },
            minimumInputLength: 2
        });

        $( "#contact" ).select2({});

        $( "#language" ).select2({});
        // $( "#language" ).select2({
        //     ajax: {
        //         url: "https://restcountries.eu/rest/v2/lang/es",
        //         cacheDataSource: [],
        //         dataType: 'json',
        //         delay: 0,
        //         method: 'GET',
        //         data: function (params) {
        //             return {
        //                 q: params.term // search term
        //             };
        //         },
        //         processResults: function (data) {
        //             // parse the results into the format expected by Select2.
        //             // since we are using custom formatting functions we do not need to
        //             // alter the remote JSON data
        //             // console.log(data)
        //             // return {
        //             //     results: data
        //             // };
        //             return {
        //                 results: $.map(data, function(obj) {
        //                     return { id: obj.alpha2Code, text: obj.name };
        //                 })
        //             };
        //         },
        //         cache: false
        //     },
        //     minimumInputLength: 2
        // });

        $.ajax(
            {
                url: '/data/search/keytopic/list',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                success: function(response){
                    var keytopicHtml = '';
                    var keytopicHtml2 = '';
                    var res = response.value;
                    for(var i=0;i<res.length;i++){
                        var keytopic = res[i];
                        // console.log(keytopic);
                        if(keytopic.subcategories.length > 0){
                            keytopicHtml = keytopicHtml +
                                '<optgroup value="'+keytopic.id+'" label="'+keytopic.name+'" class="select2-result-selectable">';

                                // keytopicHtml = keytopicHtml +
                                //     '<option value="abababababab" class="ABABABAB">'+keytopic.name+'</option>';

                            for(var j=0;j<keytopic.subcategories.length;j++){
                                var subkeytopic = keytopic.subcategories[j];
                                keytopicHtml = keytopicHtml +
                                    '<option value="'+subkeytopic.id+'">'+subkeytopic.name+'</option>';
                            }

                            keytopicHtml = keytopicHtml +
                                '</optgroup>';
                        }else{
                            keytopicHtml = keytopicHtml +
                                    '<option value="'+keytopic.id+'">'+keytopic.name+'</option>';
                        }
                        keytopicHtml2 = keytopicHtml2 +
                                    '<option value="'+keytopic.id+'">'+keytopic.name+'</option>';
                    }

                    $('#a-interest').html(keytopicHtml2);
                    $('#a-interest').select2({
                        //minimumInputLength: 1
                    });

                    $('#keytopic').html(keytopicHtml);
                    // var FRUIT_GROUPS = [
                    //     {
                    //         id: '',
                    //         text: 'Citrus',
                    //         children: [
                    //             { id: 'c1', text: 'Grapefruit' },
                    //             { id: 'c2', text: 'Orange' },
                    //             { id: 'c3', text: 'Lemon' },
                    //             { id: 'c4', text: 'Lime' }
                    //         ]
                    //     },
                    //     {
                    //         id: '',
                    //         text: 'Other',
                    //         children: [
                    //             { id: 'o1', text: 'Apple' },
                    //             { id: 'o2', text: 'Mango' },
                    //             { id: 'o3', text: 'Banana' }
                    //         ]
                    //     }
                    // ];
                    $('#keytopic').select2({
                    }).on('select2-selecting', function(e) {
                        var $select = $(this);
                        console.log('111111',$select);
                        console.log('111111',e);
                        // if (e.val == '') { // Assume only groups have an empty id
                        //     e.preventDefault();
                        //     $select.select2('data', $select.select2('data').concat(e.choice.children));
                        //     $select.select2('close');
                        // }
                    });;
                },
                error: function(request, error){

                }
            }
        );


        $('#keytopic').on("select2:select", function (e) {
            var data = e.params.data.text;
            //alert(data)
            if(data=='all'){
                $(".fav_clr > option").prop("selected","selected");
                $(".fav_clr").trigger("change");
            }
        });

        // $( "#keytopic" ).select2({
        //     ajax: {
        //         url: "/static/json/instagram-filter.json",
        //         // headers: {
        //         //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         // },
        //         cacheDataSource: [],
        //         dataType: 'json',
        //         delay: 0,
        //         method: 'GET',
        //         data: function (params) {
        //             return {
        //                 q: params.term // search term
        //             };
        //         },
        //         processResults: function (data) {
        //             // parse the results into the format expected by Select2.
        //             // since we are using custom formatting functions we do not need to
        //             // alter the remote JSON data
        //             // console.log(data)
        //             // return {
        //             //     results: data
        //             // };
        //             return {
        //                 results: $.map(data, function(obj) {
        //                     return { id: obj.alpha2Code, text: obj.name };
        //                 })
        //             };
        //         },
        //         cache: false
        //     },
        //     minimumInputLength: 2
        // });


        $( "#frequency" ).select2({});

        $( "#a-location" ).select2({
            ajax: {
                url: "/data/search/location/list",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                delay: 0,
                method: 'POST',
                data: function (params) {
                    return {
                        q: params.term // search term
                    };
                },
                processResults: function (data) {
                    // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data
                    // console.log(data)
                    // return {
                    //     results: data
                    // };
                    return {
                        results: $.map(data.predictions, function(obj) {
                            return { id: obj.description, text: obj.description };
                        })
                    };
                },
                cache: false
            },
            minimumInputLength: 2
        });

        $( "#a-language" ).select2();

        // $.ajax(
        //     {
        //         url: '/data/search/keytopic/list',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         type: 'post',
        //         success: function(response){
        //             var keytopicHtml = '';
        //             var res = response.value;
        //             for(var i=0;i<res.length;i++){
        //                 var keytopic = res[i];
        //                 // console.log(keytopic);
        //                 if(keytopic.subcategories.length > 0 && false){
        //                     keytopicHtml = keytopicHtml +
        //                         '<optgroup label="'+keytopic.name+'">';

        //                     for(var j=0;j<keytopic.subcategories.length;j++){
        //                         var subkeytopic = keytopic.subcategories[j];
        //                         keytopicHtml = keytopicHtml +
        //                             '<option value="'+subkeytopic.id+'">'+subkeytopic.name+'</option>';
        //                     }

        //                     keytopicHtml = keytopicHtml +
        //                         '</optgroup>';
        //                 }else{
        //                     keytopicHtml = keytopicHtml +
        //                             '<option value="'+keytopic.id+'">'+keytopic.name+'</option>';
        //                 }
        //             }
        //             $('#a-interest').html(keytopicHtml);
        //             $('#a-interest').select2({
        //                 //minimumInputLength: 1
        //             });
        //         },
        //         error: function(request, error){

        //         }
        //     }
        // );


        $("#a-size").ionRangeSlider({
            type: "double",
            //grid: true,
            min: 1,
            max: 300000,
            from: 1,
            to: 300000,
            step: 1,
            prefix: "K"
        });


        $(document).on("click",".select2-results__group",function(event){
            if (event.ctrlKey || event.metaKey) {
                var id =$(this).parents("div[class*='select2-container']").attr("id").replace("s2id_","");
                var element =$("#"+id);
                if (event.which == 97){
                    var selected = [];
                    element.find("option").each(function(i,e){
                        selected[selected.length]=$(e).attr("value");
                    });
                    element.select2("val", selected);
                } else if (event.which == 100){
                    element.select2("val", "");
                }
            }
        });


    });

    function searchProfile(){
        search();
    }

    function searchKeyProfile(e){
        e = e || window.event;
        var code = e.keyCode;
        if(code===13){
            search();
        }
    }

    function search(){
        var q = $("#searchQ").val();
        var location = $("#location").val();
        var contact = $("#contact").val();
        var language = $("#language").val();
        var keytopic = $("#keytopic").val();
        var gender = ($("#genderAll").prop("checked") ? 'genderAll' : null)
            ??
            ($("#genderMale").prop("checked") ? 'genderMale' : null)
            ??
            ($("#genderFemale").prop("checked") ? 'genderFemale' : null);
        var frequency = $("#frequency").val();
        var engagement1 = $("#engagement1").val();
        var engagement2 = $("#engagement2").val();
        var view1 = $("#view1").val();
        var view2 = $("#view2").val();
        var a_size = $("#a-size").val();
        var a_location = $("#a-location").val();
        var a_gender = ($("#a-genderAll").prop("checked") ? 'a-genderAll' : null)
            ??
            ($("#a-genderMale").prop("checked") ? 'a-genderMale' : null)
            ??
            ($("#a-genderFemale").prop("checked") ? 'a-genderFemale' : null);
        var a_interest = $("#a-interest").val();
        var a_language = $("#a-language").val();

        $.ajax(
            {
                url: '/data/search/profile',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                dataType: 'json',
                data: {
                    q: q,
                    location: location,
                    contact: contact,
                    language: language,
                    keytopic: keytopic,
                    gender: gender,
                    frequency: frequency,
                    engagement1: engagement1,
                    engagement2: engagement2,
                    view1: view1,
                    view2: view2,
                    a_size: a_size,
                    a_location: a_location,
                    a_gender: a_gender,
                    a_interest: a_interest,
                    a_language: a_language
                },
                success: function(response){
                    var profileHtml = '';
                    for(var i=0; i<response.length; i++){
                        var _profile = response[i];
                        profileHtml = profileHtml +
                            '<div class="col-xl-3  col-sm-12">'+
                                '<div class="friend-card card shadow">'+
                                    '<img src="assets/img/bg3.jpg" height="75" alt="profile-cover" class="img-responsive cover">'+
                                    '<div class="card-info">'+
                                        //'<img src="'+_profile.picture+'" onerror="this.onerror=null;this.src=\'assets/img/faces/non-img.png\';" alt="user" class="profile-photo-lg">'+
                                        '<img src="assets/img/faces/non-img.png" onerror="this.onerror=null;this.src=\'assets/img/faces/non-img.png\';" alt="user" class="profile-photo-lg">'+
                                        '<div class="friend-info">'+
                                            '<a href="#" class="float-right btn btn-sm btn-primary btn-pill">Profile</a>'+
                                            '<h3 class=" mb-0"><a href="timeline.html" class="profile-link">@'+_profile.userName+'</a></h3>'+
                                            '<p class="text-sm mb-0">'+_profile.fullName+'</p>'+
                                            '<p class="text-sm mb-0"><i class="fas fa-users"></i>&nbsp;&nbsp;'+convertNumberK(_profile.audienceStatistics.followers)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;'+_profile.locationShowName+'</p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                    }

                    $('#profileDiv').html('');
                    $('#profileDiv').html(profileHtml);
                },
                error: function(request, error){

                }
            }
        );
        // console.log(
        //     q,
        //     location,
        //     contact,
        //     language,
        //     keytopic,
        //     gender,
        //     frequency,
        //     engagement1,
        //     engagement2,
        //     view1,
        //     view2,
        //     a_size,
        //     a_location,
        //     a_gender,
        //     a_interest,
        //     a_language
        // );
    }

    function convertNumberK(val) {
        val = Math.round(val/100)/10;
        return val+ 'K';
    }
</script>
