<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GenerateTokenController extends Controller
{



    public function Login(Request $request){
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $user = Admin::where('email', $request->get('email'))->first();
            if (! $this->checkActiveSession($user)) {

                if (Hash::check($request->get('password'), $user->password)) {
                    // Create a new token from the new login request
                    return $this->generateToken($user);
                } else {
                    return response()->json(
                        [
                            'status' => false ,
                            'message' => 'password is not correct'],
                        400
                    );
                }
            }
                else {
                    return response()->json(
                        [
                            'status' => false ,
                            'message' => 'You can not login from two device at the same time'],
                        400
                    );
                }
        } else {
            return response()->json(
                [
             'status' => false ,
             'message' => $validator->getMessageBag()->first()],
                400
            );
        }
    }



    private function generateToken (Admin $user){
        $tokenResult= $user->createToken('Admin');
        $token = $tokenResult->accessToken;
        $user->setAttribute('token' , $token);
        return response()->json([
            'status' => true ,
            'message' => 'Logged in Successfully' , 'data'=> $user],
             200);
    }


    private function checkActiveSession($id){

        return DB::table('oauth_access_tokens')
        ->where('user_id' , '=' , $id)
        ->where('revoked' , '=' , false)
        ->exists();

        }
}
