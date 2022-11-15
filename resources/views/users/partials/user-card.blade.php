
<div class="card">
    <div class="card-body">
      <div class="d-flex flex-column align-items-center text-center">
        <img src="{{asset('images/usuarios/avatar/male-avatar.png')}}"
            alt="Avatar User" class="rounded-circle" width="150">


            <div class="col-sm-3 text-secondary">
                {{__('users.name')}}
            </div>
            <div class="col-sm-9">
                {{$user->name}}
            </div>

            <div class="text-secondary">
                {{__('users.role')}}

                <form id="update-user-role-{{$user->id}}"
                    action="{{route(trans('urls.my-profile.update'), $user->id)}}"
                    method="POST">

                    @csrf
                    @include('users.partials.update-user-role-form')

                    <input type="hidden" name="toBeUpdated" value="update-user-role">
                    @method("PATCH")
                </form>
                <button class="btn btn-sm btn-success mt-2 mb-2 quicksand"
                onclick="event.preventDefault();document.getElementById('update-user-role-{{$user->id}}').submit();" >
                {{__('auth.update-account')}}</button>

            </div>
            <div class="col-sm-9">
                {{$userRole->name}}
            </div>

            <div class="col-sm-3 text-secondary">
                <h6 class="mb-0">{{__('users.username')}}</h6>
            </div>

            <div class="col-sm-9">
                {{$user->username}}
            </div>

            <div class="col-sm-3 text-secondary">
                <h6 class="mb-0">{{__('users.email')}}</h6>
            </div>

            <div class="col-sm-9">
                {{$user->email}}
            </div>

            <hr />

      </div>
    </div>
</div>
