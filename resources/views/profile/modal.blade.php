<div class="modal fade" id="social-link-notification" tabindex="-1" role="dialog" aria-labelledby="social-link-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-primary">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-notification">System Notification</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">You should read this!</h4>
                    @if($userType === 'brand')
                    <p>You must connect your instagram account.</p>
                    @elseif($userType === 'influencer')
                    <p>You must connect your facebook account which linked to Instagram Business Account.</p>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                @if($userType === 'brand')
                <button {{$igInfo ? 'disabled' : null}} type="button" class="btn btn-instagram mt-1 mb-1" onclick="window.location.href='{{$igLink}}'"><i class="fe fe-instagram mr-2"></i>Instagram</button>
                @elseif($userType === 'influencer')
                <button {{$fbInfo ? 'disabled' : null}} type="button" class="btn btn-facebook mt-1 mb-1" onclick="javascript:fbLogin();"><i class="fe fe-facebook mr-2"></i>{{$fbInfo ? 'Facebook' : 'Connect FaceBook Accoun'}}</button>
                @endif
                {{-- <button type="button" class="btn btn-white">Ok, Got it</button> --}}
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
