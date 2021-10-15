<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only(['username', 'password']);
        if(Auth::attempt($credentials))
        {
            if(auth()->user()->is_active === 0)
            {
                return response()->json([
                    'status' => __('default.status_error'),
                    'message' => __('auth.account_locked'),
                ], 401);
            }
            else
            {
                $token = $request->user()->createToken($request->device);
                $userInfo = auth()->user();
                $userInfo->token = $token->plainTextToken;
                return response()->json($userInfo, 200);
            }
           
        }
        else
        {
            return response()->json([
                'status' => __('default.status_error'),
                'message' => __('auth.failed'),
            ], 401);
        }

        
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => __('default.status_success'),
            'message' => __('auth.logged_out')
        ], 200);
    }

    public function register(RegisterUserRequest $request)
    {
        $dataPost = $request->all();
        $dataPost['password'] = Hash::make($dataPost['password']); // mã hoá password
        $user = new User;
        $user->fill($dataPost);
        if($user->save())
        {
            return response()->json([
                'status' => __('default.status_success'),
                'message' => __('auth.register_success'),
            ], 200);
        }
        
        return response()->json([
            'status' => __('default.status_error'),
            'message' => __('auth.register_error'),
        ], 500);

    }

    public function index()
    {

    }

    // Các method dành cho admin
    public function getUsers(Request $request)
    {
        $filters = $request->only('gender', 'username', 'id', 'birthday', 'phone', 'city', 'role', 'email');
        $queryUser = User::query();

        foreach ($filters as $key => $value) { // filters thông tin mà admin cần
            if(!empty($filters[$key]))
            {
                $queryUser->where($key, $value);
            }
        }

        $result = $queryUser->paginate(10);

        return $result;       
    }

    public function updateUser(UpdateUserRequest $request, User $user)
    {
        $dataPost = $request->only(['name', 'money', 'is_active', 'password', 'city']);

        if(!empty($dataPost['password']))
        {
            $dataPost['password'] = Hash::make($dataPost['password']);
        }

        if($user->update($dataPost))
        {
            return response()->json([
                'status' => __('default.status_success'),
                'message' => __('default.update_success', ['attribute' => 'tài khoản']),
            ], 200);
        }
  
    }

    public function removeUser(User $user)
    {
        if($user->delete())
        {
            return response()->json([
                'status' => __('default.status_success'),
                'message' => __('default.remove_success', ['attribute' => 'tài khoản']),
            ], 200);
        }

        return response()->json([
            'status' => __('default.status_error'),
            'message' => __('default.remove_error', ['attribute' => 'tài khoản']),
        ], 500);
        
    }

}
