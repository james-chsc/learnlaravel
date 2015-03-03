<?php

namespace App\Controllers\Admin;

use Auth, BaseController, Form, Input, Redirect, Sentry, View;

class AuthController extends BaseController {

    /**
     * 顯示登入頁面
     * @return View
     */
    public function getLogin()
    {
        return View::make('admin.auth.login');
    }

    /**
     * POST 登入驗證
     * @return Redirect
     */
    public function postLogin()
    {
        $credencials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        try
        {
            $user = Sentry::authenticate($credencials, false);
            if ($user)
            {
                return Redirect::route('admin.pages.index');
            }
        } catch (\Exception $e)
        {
            return Redirect::route('admin.login')->withErrors(array('login' => $e->getMessage()));
        }
    }

    /**
     * 登出
     * @return Redirect
     */
    public function getLogout()
    {
        Sentry::logout();

        return Redirect::route('admin.login');
    }
}