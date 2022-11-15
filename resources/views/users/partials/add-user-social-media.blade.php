<h3>{{__('my-profile.add-social-media')}}</h3>
<form id="add-social-media-user-{{$user->id}}"
    @if($userSocialMediaMethod=="store")
    action="{{route(trans($userSocialMediaFormRoute))}}"
    @elseif($userSocialMediaMethod=="update")
    action="{{route(trans($userSocialMediaFormRoute), $user->id)}}"
    @endif
    method="POST">

    @csrf
    @include('users.partials.add-user-social-media-form')

    <input type="hidden" name="toBeUpdated" value="add-social-media">
    @if($userSocialMediaMethod=="update")
        @method("PATCH")
    @endif
</form>
<button class="btn btn-sm btn-success quicksand"
onclick="event.preventDefault();document.getElementById('add-social-media-user-{{$user->id}}').submit();" >
{{__('auth.update-account')}}</button>
