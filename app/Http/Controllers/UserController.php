<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;


class UserController extends Controller
{
    /**
     * ログイン
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;
            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user
          ]);
        } else {
            //認証エラー(401)
            return response()->json([
                'success' => false,
                'message' => 'メールアドレスまたはパスワードが違います。',
            ], 401);
        }
    }

    /**
     * 登録
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
          return response()->json([
            'success' => false,
            'message' => $validator->errors(),
          ], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('appToken')->accessToken;

        return response()->json([
          'success' => true,
          'token' => $success,
          'user' => $user
      ]);
    }

    /**
     * ログアウト
     */
    public function logout(Request $res)
    {
      if (Auth::user()) {
        $user = Auth::user()->token();
        $user->revoke();

        return response()->json([
          'success' => true,
          'message' => 'Logout successfully'
      ]);
      }else {
        return response()->json([
          'success' => false,
          'message' => 'Unable to Logout'
        ]);
      }
     }

     /**
      * ユーザー名変更
      */
      public function updateUsername(Request $request){
        $user = User::find(Auth::id());

        $user->user_name = $request['user_name'];
        $user->save();

        return $user;
      }

      /**
       * メールアドレス変更
       */
      public function updateEmail(Request $request){
        $user = User::find(Auth::id());

        $user->email = $request['email'];
        $user->save();

        return $user;
      }

      /**
       * パスワード変更
       */
      public function updatePassword(Request $request){
        $user = User::find(Auth::id());
        if($user->password == Hash::make($request['old_password'])){
          $user->password = Hash::make($request['new_password']);
          $user->save();
          return 'success';
        }

        return 'faild';
      }

      /**
       * パスワード変更
       */
      public function updateImage(Request $request){
        $user = User::find(Auth::id());
        $user->profile_image_path = $request['image_url'];
        $user->save();
        return $user;
      }


      /**
       * アカウント削除
       */
      public function deleteUser(){
        $user = User::find(Auth::id());
        $user->delete();
        
        return $user;
      }

}
