<?php
namespace App\Http\Responses;

use App\Events\LogedUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Fortify;


class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request): mixed
    {
        event(new LogedUser(Auth::user()));
        $user = User::where('id' , Auth::id())->first();
        $home = $user->isUser ? '/report' : '/dashboard' ;
        Log::info($home.' the home');
        return redirect($home);
    }
}
