<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/events';
    protected $redirectAfterLogout = '/events';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed',
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
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }

    function moreReg(){
        $intrests = ['Fashion Show', 'Trade Fair', 'Career Fair', 'Talent Hunt', 'Talk Show', 'Training', 'Workshop',
                    'Seminar', 'Corporate Party', 'Tourism', 'Dinner Party', 'Pool Party', 'Carnival', 'Wedding Ceremony',
                    'Burial Ceremony', 'Engagement Party', 'Proposal Party', 'Convention', 'Sport Competition',
                    'Award Ceremony', 'Road Trip', 'Naming Ceremony', 'Birthday Party', 'Contest', 'Coronation',
                    'Ordination', 'Cookout'];

        $services = [
                "publicity"=>[
                    'Graphics Design', 'Animation', 'Printing', 'Souvenir/Gift Management', 'Branding',
                    'Event Website Management', 'Social Media Hype', 'Radio Jingles',
                    'Television Advertisement', 'Billboard Advertisement'
                ],
                "Rentals" =>[
                    's'
                ]
        ];

        return view("auth.moreRegister", compact('intrests', 'services'));
    }

}
