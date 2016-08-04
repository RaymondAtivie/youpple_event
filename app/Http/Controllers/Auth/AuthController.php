<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Helpers\M;
use Auth;

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
        $this->middleware($this->guestMiddleware(), ['except' => ['logout', 'moreReg', 'saveUserInfo']]);
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
        M::flash("Successfully Registered. Please provide extra details");
        $this->redirectTo = '/events/register/more';

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
                'Chairs', 'Tables', 'Canopy and Tent', 'Toys', 'Bouncing Castle', 'Crockery Set',
                'Costume', 'Sound Equipment', 'Visual Equipment', 'Musical Instrument', 'Lighting',
                'Stage', 'Decoration Items', 'Halls', 'Garden and Park', 'Pool'
            ],
            "Logistics and transportation" => [
                "Transport", "Accommodation", "Decoration", "Cleaning Services", "Laundry Services",
                "Waste Disposal", "Parking Services"
            ],
            "Human Resource" => [
                "Make-up Artiste", "Models", "Ushers", "Bouncers", "Security Officials",
                "Master of Ceremony / Moderator", "Comedian", "Clown", "Dancer/ Dance Crew",
                "Musical Band", "Music Artiste", "Disc Jockey", "Public Speaker", "Religious Leader",
                "Caterer", "Waiter", "Undertaker", "Sound Engineer", "Videographer", "Photographer",
                "Fashion Designer"
            ],
            "Other Services" => [
                "Bouquet", "Cake and Snack", "Drink Supply", "Event Planning", "Saloon and Spa", "Wardrobe Management"
            ]
        ];

        return view("auth.moreRegister", compact('intrests', 'services'));
    }

    function saveUserInfo(Request $request){
        Auth::user()->addInfo($request->all());

        M::flash("Successfully Saved your information. Change it anytime in your profile");
        return redirect('events');
    }

}
