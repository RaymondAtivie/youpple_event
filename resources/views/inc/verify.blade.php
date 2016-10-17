@if($user)
    @if(!$user->verify)
        <div class="alert alert-warning" style="text-align: center">
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}

            Please you are yet to confirm your email address <b>{{$user->email}}</b>. Please confirm it by clicking the link sent to you.
        </div>
    @endif
@endif
