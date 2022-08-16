<?php
namespace App\Http\Responses;

use App\Events\LogedUser;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Fortify;


class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $user = Auth::user();
        $user->isOnline  = true;
        $user->save();
        event(new LogedUser(Auth::user()));
        $home = Auth::user()->enabled ? '/dashboard' : '/user' ;

        return redirect()->intended($home);
    }
}
