<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Tipology;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function redirectTo()     
    {    
        $users = User::where('id', auth()->id())->first();   
        return route('users.index' , compact('users') );    
    }

    public function showRegistrationForm()
    {
        $tipologies = Tipology::all();

        return view('auth.register', compact('tipologies'));
    }

    

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
            'business_name' => ['required', 'string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'vat_number' => ['required', 'string', 'digits:11', 'numeric'],
            'street_address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits_between:6,10'],
            // da finire validazione cover 
            'cover' => ['string', 'max:255']
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
        // creazione dello slug 
        $data['slug'] = User::getUniqueSlug($data['business_name']);

        // recupero tipologie 
        $tipologies = Tipology::all();

        $user_data = [
            'business_name' => $data['business_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'vat_number' => $data['vat_number'],
            'street_address' => $data['street_address'],
            'phone_number' => $data['phone_number'],
            'cover' => $data['cover'],
            'slug' => $data['slug'],
        ];

        $user = User::create($user_data);  
        $user->tipologies()->sync($data['tipologies']); 

        return $user;

        // $user = new User();
        // $user->fill($data);
        // $user->save();
    }
}
