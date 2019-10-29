<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
    protected $redirectTo = '/dashboard';

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
     * Make a request to IFRN Open API to get user data
     *
     * @param string $username
     * @return array
     * @throws \Iluminate\Validation\ValidationException
     **/
    protected function requestDataFromApi(string $username)
    {
        $studentResourceId = config('constants.student_resource_id');

        $requestHttpParameters = http_build_query([
            'resource_id' => $studentResourceId,
            'q' => $username,
            'limit' => 1
        ]);

        $requestUrl = config('constants.ifrn_open_data_api_url');
        $requestUrl .= '?'.$requestHttpParameters;

        $apiData = file_get_contents($requestUrl);
        $apiData = json_decode($apiData, true);

        return $apiData;
    }

    /**
     * Get user data from IFRN Open API
     *
     * @param string $username
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     **/
    protected function getUserData(string $username)
    {
        $apiData = $this->requestDataFromApi($username);
        $resultData = $apiData['result'];

        if (empty($resultData['records'])) {
            ValidationException::withMessages([
                'username' => 'Not recognized'
            ]);
        }

        $userData = $resultData['records'][0];

        return $userData;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'integer', 'digits:11', 'unique:users'],
            'username' => ['required', 'integer', 'digits_between:0,255', 'unique:users'],
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
        $personalUserData = $this->getUserData($data['username']);

        return User::create([
            'name' => $personalUserData['nome'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
