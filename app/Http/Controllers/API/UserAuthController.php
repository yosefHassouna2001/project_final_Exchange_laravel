<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserAuthController extends Controller
{
    public function register(Request $request){

        $validator = Validator($request->all() , [
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6'
        ]);

        if(! $validator->fails()){
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));

            $isSaved = $admins->save();
            if($isSaved){
                return response()->json([
                    'status' => true ,
                    'message' => "Created is Successfully",

                ] , 200);

            }
            else{
                return response()->json([
                    'status' => false ,
                    'message' => "Created is Failed",

                ] , 400);
            }

        }
        else{
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),

            ] , 400);
        }
    }
// Login With Personal
    // public function login(Request $request){
    //     $validator = Validator($request->all() ,[
    //         'email' => 'required|email|exists:admins,email',
    //         'password' => 'required|string'

    //     ]);

    //     if(! $validator->fails()){
    //         $admins = Admin::where('email', '=' , $request->get('email'))->first();
    //         if(Hash::check($request->get('password'), $admins->password)){
    //             $token = $admins->createToken('admin-api');
    //             $admins->setAttribute('token' , $token->accessToken);
    //             return $token;

    //             return response()->json([
    //                 'status' => true ,
    //                 'message' => 'Login is Successfully'

    //             ] , 200);
    //         }
    //         else{
    //             return response()->json([
    //                 'status' => false ,
    //                 'message' => 'Login is Failed'

    //             ] , 400);
    //         }
    //     }
    //     else{
    //         return response()->json([
    //             'status' => false ,
    //             'message' => $validator->getMessageBag()->first(),

    //         ] , 400);
    //     }
    // }

    // public function logout(Request $request){
    //     $token = $request->user('admin-api')->token();
    //     $revoked = $token->revoke();

    //     return response()->json([
    //         'status' => true ,
    //         'message' => 'Logout is Successfully' ,
    //     ] , 200);
    // }

    public function logout(Request $request){
        $token = $request->user('admin-api')->token();
        $revoked = $token->revoke();

        return response()->json([
            'status' => true ,
            'message' => "Logout is Successfully",
        ] , 200);

    }

    public function forgetPassword(Request $request){
        $validator = Validator($request->all() ,[
            'email' => 'required|email|exists:admins,email' ,
        ]);

        if (! $validator->fails()){
            $admins = Admin::where('email' , '=' , $request->get('email'))->first();
            $authCode = random_int(1000 , 9999);
            $admins->authCode = Hash::make($authCode);

            $isSaved = $admins->save();
            return response()->json([
                'status' => $isSaved ,
                'message' => $isSaved ? 'تم ارسال الكود الى الايميل الخاص بك' : 'فشل ارسال الكود تحقق من صحة الايميل',
                'code' => $authCode
            ]);
        }
        else{
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ] , 400);
        }
    }

    public function resetPassword(Request $request){
        $validator = Validator($request->all() ,[
            'email' => 'required|email|exists:admins,email' ,
            'authCode' => 'required|digits:4',
            'password' => 'required|string|min:3|confirmed'
        ]);

            if (! $validator->fails()){
                $admins = Admin::where('email'  , $request->get('email'))->first();
                if(Hash::check($request->get('authCode') , $admins->authCode)){
                    $admins->password = Hash::make($request->get('password'));
                    $admins->authCode = null ;

                    $isSaved = $admins->save();
                    return response()->json([
                        'status' => $isSaved ,
                        'message' => $isSaved ? 'تم انشاء كلمة مرور جديدة' : 'فشلت عملية انشاء كلمة مرور جديدة',
                    ] , $isSaved ? 200 : 400);

                }
                else{
                    return response()->json([
                        'status' => false,
                        'message' => 'REset is Failed',
                    ] , 400);
                }
            }
            else{
                return response()->json([
                    'message' => $validator->getMessageBag()->first()
                ] , 400);
            }
        }

    //     // Login With Grant (تسجيل من جهاز واحد)
    // public function login(Request $request){
    //     $validator = Validator($request->all() ,[
    //         'email' => 'required|email|exists:admins,email',
    //         'password' => 'required|string'
    //     ]);

    //     if(! $validator->fails()){
    //         $admins = Admin::where('email', '=' , $request->get('email'))->first();
    //         if(Hash::check($request->get('password'), $admins->password)){
    //             if( ! $this->checkActiveSession($admins->id)){
    //                 $token = $admins->createToken('admin-api');
    //                 $admins->setAttribute('token' , $token->accessToken);
    //                 return $token;

    //                 return response()->json([
    //                     'status' => true ,
    //                     'message' => 'Login is Successfully'

    //                 ] , 200);
    //             }
    //             else{
    //                 return response()->json([
    //                     'status' => false ,
    //                     'message' => 'هذا الحساب مسجل مسبقا'

    //                 ] , 400);
    //             }

    //         }
    //         else{
    //             return response()->json([
    //                 'status' => false ,
    //                 'message' => 'Login is Failed'

    //             ] , 400);
    //         }
    //     }
    //     else{
    //         return response()->json([
    //             'status' => false ,
    //             'message' => $validator->getMessageBag()->first(),

    //         ] , 400);
    //     }
    // }


    // Login With Personal
    // public function login(Request $request){
    //     $validator = Validator($request->all() ,[
    //         'email' => 'required|email|exists:admins,email',
    //         'password' => 'required|string'

    //     ]);

    //     if(! $validator->fails()){
    //         $admins = Admin::where('email', '=' , $request->get('email'))->first();
    //         if(Hash::check($request->get('password'), $admins->password)){
    //             $this->endPrevioseFunction($admins->id);
    //             $token = $admins->createToken('admin-api');
    //             $admins->setAttribute('token' , $token->accessToken);
    //             return $token;

    //             return response()->json([
    //                 'status' => true ,
    //                 'message' => 'Login is Successfully'

    //             ] , 200);
    //         }
    //         else{
    //             return response()->json([
    //                 'status' => false ,
    //                 'message' => 'Login is Failed'

    //             ] , 400);
    //         }
    //     }
    //     else{
    //         return response()->json([
    //             'status' => false ,
    //             'message' => $validator->getMessageBag()->first(),

    //         ] , 400);
    //     }
    // }

    public function Login(Request $request){
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $user = Admin::where('email', $request->get('email'))->first();
            if (!$this->checkActiveSession($user)) {

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


     public function login(Request $request){
        $validator = Validator($request->all() ,[
            'email' => 'required|email',
            'password' => 'required|string'

        ]);

        if(! $validator->fails()){

        $response = Http::asForm()->post('http://127.0.0.1:8000/oauth/token', [
                'grant_type' => 'password',
                'client_id' => '9',
                'client_secret' => 'sTQuKlE4lANtMorSQ9a9HmglqzXxJ6Jf5B8sbuj6',
                'username' => $request->get('email'),
                'password' => $request->get('password'),
                'scope' => '',
            ]);

            return $response();
            // $admins = Admin::where('email', '=' , $request->get('email'))->first();

        }
        else{
            return response()->json([
                'status' => false ,
                'message' => $validator->getMessageBag()->first(),

            ] , 400);
        }
    }

        private function checkActiveSession($id){

            return DB::table('oauth_access_tokens')
            ->where('user_id' , '=' , $id)
            ->where('revoked' , '=' , false)
            ->exists();

            }

        private function endPrevioseFunction($id){
            return DB::table('oauth_access_tokens')
            ->where('user_id' , '=' , $id)
            ->where('name' ,'=' ,'admin-api')
            ->update([
                'revoked' => true
            ]);
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

}
