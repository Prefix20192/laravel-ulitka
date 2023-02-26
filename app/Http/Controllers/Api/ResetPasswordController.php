<?php

namespace App\Http\Controllers\Api;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required | string | email | max:255 | unique:users',
            'password' => 'required | between: 8, 255 | confirmed',
            'token' => 'required'
        ]);

        if($validator->fails()){
            return response([
                'errors' => $validator->errors()->all()
            ], 404);
        }

        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password){
                $this->resetPassword($user, $password);
            }
        );

        return $response == Password::PASSWORD_RESET ? $this->setResetResponse($request, $response) : $this->setResetFailedResponse($request, $response);
    }

    protected function credentials(Request $request)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    protected function resetPassword($user, $password)
    {
       $this->setUserPassword($user, $password);
       $user->setRememberToken(Str::random(60));
       $user->save();
       event(new PasswordReset($user));
    }

    protected function setUserPassword($user, $password)
    {
        $user->password = Hash::make($password);

    }

    public function broker()
    {
        return Password::broker();
    }

    protected function setResetResponse(Request $request, $response){
        return $response->json([
           "message" => "Password reset successed",
            "response" => $response
        ], 200);
    }
    protected function setResetFailedResponse(Request $request, $response){
        return $response->json([
           "message" => "Password reset failed",
            "response" => $response
        ], 500);
    }

}
