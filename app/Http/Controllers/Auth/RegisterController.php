<?php

namespace App\Http\Controllers\Auth;

use App\Institution;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'institution' => ['required'],
            'role' => ['required'],
            'titre' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'telephone' => ['string', 'max:13'],
            'adresse' => ['string', 'max:255'],
            'date_de_naissance' => ['date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'institution_id' => $data['institution'],
            'role' => $data['role'],
            'titre' => $data['titre'],
            'name' => $data['name'],
            'telephone' => $data['telephone'],
            'adresse' => $data['adresse'],
            'date_de_naissace' => ['date_de_naissance'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function showRegistrationForm() {
        $institutions = Institution::orderBy('nom', 'asc')->get();

        return view('auth.register', compact('institutions'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
