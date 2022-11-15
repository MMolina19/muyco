<h3>{{__('my-profile.add-location')}}</h3>
<form id="add-location-user-{{$user->id}}"
    @if($userLocationMethod=="store")
    action="{{route(trans($userLocationFormRoute))}}"
    @elseif($userLocationMethod=="update")
    action="{{route(trans($userLocationFormRoute), $user->id)}}"
    @endif
    method="POST">

    @include('users.partials.add-user-location-form')

    @csrf
    <input type="hidden" name="toBeUpdated" value="add-location">
    @if($userLocationMethod=="update")
        @method("PUT")
    @endif
</form>
<button class="btn btn-sm btn-success quicksand"
onclick="event.preventDefault();document.getElementById('add-location-user-{{$user->id}}').submit();" >
{{__('auth.update-account')}}</button>
