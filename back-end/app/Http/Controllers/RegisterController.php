<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
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
     * @param  object $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function signup(Request $data)
    {
        $validator = Validator::make($data->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required',
            'confirmation'=>'required|same:password'
        ]);
        if($validator->fails()){
            $response=[
                'success'=>'fail',
                'message'=>$validator->errors()
            ];
            return $response;}else{
           
                return User::create([
                    'name' => $data->input('nom'),
                    'prenom' => $data->input('prenom'),
                    'email' => $data->input('email'),
                    'role'=>$data->input('role'),
                    'password' => Hash::make($data['password']),
                ]);
            }

    }

}
