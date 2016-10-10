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
use App\Slim;
use Socialite;
use App\Models\SocialLogins;

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
        $this->middleware($this->guestMiddleware(), [
            'except' => ['logout', 'moreReg', 'saveUserInfo', 'getSocialRedirect', 'getSocialHandle']
        ]);
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
        $images = Slim::getImages('picture');
        $filename = "dp/unknown.jpg";
        if(isset($images[0])){
            $image = $images[0];

            $lExt = $image['input']['ext'];
            $lName = $image['input']['name'];
            $lData = $image['output']['data'];

            $file = Slim::saveFile($lData, $lName, "jpg", false);

            $pid = rand(100000, 999999999);

            $filename = "dp/".$pid.".".$lExt;
            rename($file['path'], "userPhotos/".$filename);
        }

        // dd($data);

        if($data['user_type'] == "provider"){
            M::flash("Successfully Registered. Please fill your details");
            $this->redirectTo = '/events/becomeProvider';
        }else{
            M::flash("Successfully Registered.");
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'picture' => $filename,
            'password' => bcrypt($data['password']),
        ]);
    }

    function moreReg(){
        $intrests = M::getIntrests();

        $services = M::getServices();

        return view("auth.moreRegister", compact('intrests', 'services'));
    }

    function saveUserInfo(Request $request){
        Auth::user()->addInfo($request->all());

        M::flash("Successfully Saved your information. Change it anytime in your profile");
        return redirect('events');
    }

    public function getSocialRedirect( $provider ){
        // dd($provider);

        $providerKey = \Config::get('services.' . $provider);
        if(empty($providerKey))
        return view('pages.status')
        ->with('error','No such provider');

        return Socialite::driver( $provider )->redirect();
    }

    public function getSocialHandle( $provider ){
        $user = Socialite::driver( $provider )->user();

        $socialUser = null;

        //Check is this email present
        $userCheck = User::where('email', '=', $user->email)->first();
        if(!empty($userCheck))
        {
            $socialUser = $userCheck;
            $url = '/events';
        }
        else
        {
            $sameSocialId = SocialLogins::where('social_id', '=', $user->id)->where('provider', '=', $provider )->first();

            if(empty($sameSocialId)){
                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User;
                $newSocialUser->email = $user->email;
                $newSocialUser->name = $user->name;
                $newSocialUser->save();

                $socialData = new SocialLogins;
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $newSocialUser->social()->save($socialData);

                $socialUser = $newSocialUser;
            }
            else
            {
                //Load this existing social user
                $socialUser = $sameSocialId->user;
            }

            M::flash("Successfully login. Please fill additional information", "success");
            $url = '/events/myprofile';
        }


        auth()->login($socialUser);

        return redirect()->to($url);
    }

}
