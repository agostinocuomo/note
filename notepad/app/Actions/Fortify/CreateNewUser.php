<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
       
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
                'firstname' => [ 'string', 'max:20'],
            'lastname' => [ 'string', 'max:20'],
          'zip' => [ 'string', 'max:20'],
           'city' => [ 'string', 'max:20'],
            'password' => $this->passwordRules(),
        ])->validate();
         

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'zip' => $input['zip'],
            'city' => $input['city'],
        ]);
    }
}
