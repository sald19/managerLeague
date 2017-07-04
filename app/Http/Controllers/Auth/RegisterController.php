<?php

namespace App\Http\Controllers\Auth;

use App\Invitation;
use App\Rules\ValidInvitation;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     *  {@inheritDoc}
     */
    public function showRegistrationForm()
    {
        $invitation = null;

        if(request()->exists('token')) {
            $token = request('token');
            $invitation = Invitation::where([['token', '=', $token], ['used', '=', 0]])->first();

            throw_if(empty($invitation), AuthorizationException::class, 'No tan rapido, campeon');
        }

        return view('auth.register', compact('invitation'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'team' => 'sometimes|required|min:3',
            'token' => [
                'sometimes',
                Rule::exists('invitations')->where(function ($query) {
                    $query->where('used', 0);
                })
            ]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectTo()
    {
        return '/league';
    }
}
