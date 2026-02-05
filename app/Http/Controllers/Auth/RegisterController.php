<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller implements HasMiddleware
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


    public static function middleware()
    {
        return [
            new Middleware('guest')
        ];
    }

    public function showRegistrationForm()
    {
        return view('website.auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        if (!$this->checkTerms($request->terms)) {
            return redirect()->back()->withErrors([
                'terms' => 'You must accept the terms and conditions'
            ]);
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'governorate_id' => ['required', 'integer', 'exists:governorates,id'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'terms' => ['required', 'in:on']
        ]);
    }

    public function checkTerms($terms)
    {
        if ($terms === 'on' || $terms === 1) {
            return true;
        } else {
            return false;
        }

    }


    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'country_id' => $data['country_id'],
            'governorate_id' => $data['governorate_id'],
            'city_id' => $data['city_id']
        ]);
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function registered(Request $request, $user)
    {
        Session::flash('success', __('dashboard.operation_success'));
        return redirect()->route('website.user-profile');
    }
}
