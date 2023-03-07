<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EndPreiviousTokenController extends Controller
{

     // Login With Personal
    public function login(Request $request){
        $validator = Validator($request->all() ,[
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string'

        ]);

        if(! $validator->fails()){
            $admins = Admin::where('email', '=' , $request->get('email'))->first();
            if(Hash::check($request->get('password'), $admins->password)){
                $this->endPrevioseFunction($admins->id);
                $token = $admins->createToken('admin-api');
                $admins->setAttribute('token' , $token->accessToken);
                return $token;

                return response()->json([
                    'status' => true ,
                    'message' => 'Login is Successfully'

                ] , 200);
            }
            else{
                return response()->json([
                    'status' => false ,
                    'message' => 'Login is Failed'

                ] , 400);
            }
        }
        else{
            return response()->json([
                'status' => false ,
                'message' => $validator->getMessageBag()->first(),

            ] , 400);
        }
    }


    private function endPrevioseFunction($id){
        return DB::table('oauth_access_tokens')
        ->where('user_id' , '=' , $id)
        ->where('name' ,'=' ,'admin-api')
        ->update([
            'revoked' => true
        ]);
    }
}
