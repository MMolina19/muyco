<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">{{__('users.name')}}</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$user->name}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">{{__('users.username')}}</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$user->username}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">{{__('users.email')}}</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$user->email}}
            </div>
        </div>
        <hr>
    </div>
</div>
