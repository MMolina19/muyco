<?php

namespace App\Actions\Fortify;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers {
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input) {
        Validator::make($input, [
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(), //passwordRules verifica password contra paswword_confirmation
            //'password_confirmation' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'username'  => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            //'password_confirmation' => $input['password_confirmation'],
            'active'    =>  1,
        ]);

        $role = Role::where(['name' => 'Customer'])->first();
        $user->roles()->attach($role->id);

        return $user;
    }
}
