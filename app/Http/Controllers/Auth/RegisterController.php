<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Services\UserServiceInterface;
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

    protected $redirectTo = '/home';
    private $userServiceInterface;


    /**
     * RegisterController constructor.
     * @param UserServiceInterface $userServiceInterface
     */
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userServiceInterface = $userServiceInterface;
        $this->middleware('guest');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegister()
    {
        return view('auth/register');
    }

    /**
     * Get data input and register new user
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doRegister(UserRequest $request)
    {
        $result = $this->userServiceInterface->create($request->toUser());
        if ($result) {
            return redirect()->intended('login')->with('message', trans('auth.register_complete'));
        }
        return redirect()->back()->with('message', trans('auth.failed'));
    }
}
