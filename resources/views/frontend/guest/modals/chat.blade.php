<!-- START - Modal - Message -->

<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="messageModalLabel">Chat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <img class="rounded-circle w-25 mb-3" src="{{ ($account->profile && $account->profile->avatar) ?   $account->profile->avatar :  asset('backend/images/avatar.png') }}" alt="User">
                <h4 class="fw-bold">Hey, I'm {{ ($account->profile->first_name) ? $account->profile->first_name : '-'  }} {{ ($account->profile->last_name) ? $account->profile->last_name : '-'  }}, Let me help you understand the local market and answer any
                    questions.</h4>
                <form id="formChatRequest" method="POST" class="text-start" action="{{url('/account/send-message')}}">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{$account->id}}">
                    {{-- <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Full Name*">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email*">
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" placeholder="Phone*">
                    </div> --}}
                    <div class="mb-3">
                        <textarea class="form-control" rows="3" name="message" placeholder="Your Message" required></textarea>
                    </div>

                    {{-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1"> <i class="bi-phone text-primary h5"></i> Request a Video Chat</label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary text-uppercase w-100 fw-semibold">Let's
                        Talk</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- END - Modal - Message -->
