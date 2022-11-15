<h3>{{__('my-profile.add-contact-info')}}</h3>
<form id="add-contact-info-user-{{$user->id}}"
    @if($userContactInfoMethod=="store")
    action="{{route(trans($userContactInfoFormRoute))}}"
    @elseif($userContactInfoMethod=="update")
    action="{{route(trans($userContactInfoFormRoute), $user->id)}}"
    @endif
    method="POST">

    @include('users.partials.add-user-contact-info-form')

    @csrf
    <input type="hidden" name="toBeUpdated" value="add-contact-info">
    @if($userContactInfoMethod=="update")
        @method("PUT")
    @endif
</form>
<button class="btn btn-sm btn-success quicksand"
onclick="event.preventDefault();document.getElementById('add-contact-info-user-{{$user->id}}').submit();" >
{{__('auth.update-account')}}</button>
