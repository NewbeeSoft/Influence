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

<!-- Adon JS -->
<script src="/assets/js/custom.js"></script>

<script type="text/javascript">
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
    });
</script>

