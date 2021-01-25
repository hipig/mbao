<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthorizationWeappRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class AuthorizationsController extends Controller
{
    public function weappStore(AuthorizationWeappRequest $request)
    {
        // 注册携带用户信息
        $userInfo = $request->userInfo;

        // 根据 code 获取微信 openid 和 session_key
        $miniProgram = \EasyWeChat::miniProgram();
        $data = $miniProgram->auth->session($request->code);

        // 如果结果错误，说明 code 已过期或不正确，返回 403 错误
        if (isset($data['errcode'])) {
            throw new AuthenticationException('code 不正确');
        }

        // 找到 openid 对应的用户
        $user = User::query()->where('weapp_openid', $data['openid'])->first();

        $attributes = [
            'name' => $userInfo['nickName'],
            'avatar' => $userInfo['avatarUrl'],
            'weapp_session_key' => $data['session_key'],
        ];

        if (!$user) {
            $attributes['weapp_openid'] = $data['openid'];
            $user = User::create($attributes);
        }

        $user->fill($attributes);
        $user->save();
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
