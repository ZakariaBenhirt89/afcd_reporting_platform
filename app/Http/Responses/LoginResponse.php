<?php
namespace App\Http\Responses;

use App\Events\LogedUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        event(new LogedUser(Auth::user()));
        $home = Auth::user()->isUser ? '/report' : '/dashboard' ;
        Log::info($home.' the home');
        return redirect()->intended($home);
    }
}
