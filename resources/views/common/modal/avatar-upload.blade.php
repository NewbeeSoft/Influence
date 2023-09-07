<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>
<link href="/assets/css/crop.css" rel="stylesheet" type="text/css">
<!-- Modal -->
<div class="modal fade" id="photoUploadModal" tabindex="-1" role="dialog" aria-labelledby="photoUploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="photoUploadModalLabel">Modal title</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="file-input" type="file" class="dropify" data-height="120"/>
                <div class="box-2">
                    <div class="result"></div>
                </div>
                <div class="box-2 img-result hide">
                    <img class="cropped" src="" alt="">
                </div>
                <div class="box">
                    <div class="options hide">
                        <input type="hidden" class="img-w" value="250"/>
                        <input type="hidden" class="img-h" value="250"/>
                    </div>
                    <!-- <button class="btn save hide">Save</button> -->
                    <!-- <a href="" class="btn download hide">Download</a> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save hide">Crop</button>
                <button type="button" class="btn btn-primary download hide">Save</button>
            </div>
        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js'></script>
<script src="/assets/js/crop.js"></script>