<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\City;
use App\Models\Province;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
    protected $redirectTo = "/home/lo";

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user=User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
            'email' => $data['email'],
            'bank_number' => $data['bank_number'],
            'phone' => $data['phone'],
            'national_code' => $data['national_code'],
            'password' => Hash::make($data['password']),
        ]);
        $address=new Address();
        $address->address=$data['address'];
        $address->company=$data['company'];
        $address->post_code=$data['postcode'];
        $address->province_id=$data['province'];
        $address->city_id=$data['city'];
        $address->user_id=$user->id;
        $address->save();
        $cart=new Cart();
        $cart->name=$user->id.$user->name;
        $cart->user_id=$user->id;
        $cart->save();
        session()->flash('success','ثبت نام شما با موفقیت انجام شد . لطفا حساب کاربری خود را تایید کنید .');
        return $user;
    }
    public function showRegistrationForm()
    {
        $provinces=Province::all();
        $cities=City::all();
        return view('auth.register',compact('cities','provinces'));
    }
}
