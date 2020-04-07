<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Permission;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//這裡是對註冊這個功能做控制
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
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     //這裡可以對欄位作輸入要求
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => [ 'max:255'],
            'last_name' => [ 'max:255'],
            'email' => [ 'email', 'max:255','unique:users'],
            'staff_number' => [ 'max:255','unique:users'],
            'contact_phone' => [ 'max:255'],
            'fax' => [ 'max:255'],
            'cell_phone' => [ 'max:255'],
            'gender' => [ 'max:255'],
            'birthday' => [ 'max:255'],
            'contact_address' => [ 'max:255'],
            'class' => [ 'max:255'],
            'position' => [ 'max:255'],
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
      //這裡是接收新增使用者(管理者)的資料
        if($data['permission']=='super_manager'){

        $permission = new Permission([
            'name' => $data['name'],
            'advertising' => 'yes',
            'imformation' => 'yes',
            'fileroom' => 'yes',
            'photealbum' => 'yes',
            'networklink' => 'yes',
            'page' => 'yes',
            'auth' => 'yes',
            'register' => 'yes',
            'positions' => 'yes',
            'setup' => 'yes',
            'menus' => 'yes',
            'website_information' => 'yes',
            'keyword' => 'yes',
            'setupchange' => 'yes',
            'permission' => 'yes'
        ]);

        $permission->save();

            return User::create([
                'name' => $data['name'],
                'password' => Hash::make($data['password']),
                'first_name' => $data['first_name'],
                'email' => $data['email'],
                'staff_number' => $data['staff_number'],
                'contact_phone' => $data['contact_phone'],
                'fax' => $data['fax'],
                'cell_phone' => $data['cell_phone'],
                'gender' => $data['gender'],
                'birthday' => $data['birthday'],
                'contact_address' => $data['contact_address'],
                'permission' => $data['permission'],
                'class' => $data['class'],
                'position' => $data['position'],
            ]);
        }
        //這裡是接收新增使用者(一般使用者)的資料
        else{

        $permission = new Permission([
            'name' => $data['name'],
            'advertising' => 'no',
            'imformation' => 'no',
            'fileroom' => 'no',
            'photealbum' => 'no',
            'networklink' => 'no',
            'page' => 'no',
            'auth' => 'no',
            'register' => 'no',
            'positions' => 'no',
            'setup' => 'no',
            'menus' => 'no',
            'website_information' => 'no',
            'keyword' => 'no',
            'setupchange' => 'no',
            'permission' => 'no'
        ]);

        $permission->save();

            return User::create([
                'name' => $data['name'],
                'password' => Hash::make($data['password']),
                'first_name' => $data['first_name'],
                'email' => $data['email'],
                'staff_number' => $data['staff_number'],
                'contact_phone' => $data['contact_phone'],
                'fax' => $data['fax'],
                'cell_phone' => $data['cell_phone'],
                'gender' => $data['gender'],
                'birthday' => $data['birthday'],
                'contact_address' => $data['contact_address'],
                'permission' => $data['permission'],
                'class' => $data['class'],
                'position' => $data['position'],
            ]);
        }
    }
}
