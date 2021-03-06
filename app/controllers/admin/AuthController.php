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
     * 登入驗證
     * @return Redirect
     */
    public function postLogin()
    {
        $credentials = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ];

        try
        {
            $user = Sentry::authenticate($credentials, false);

            if ($user)
            {
                return Redirect::route('admin.pages.index');
            }

        } catch (\Exception $e)
        {
            return Redirect::route('admin.login')
                           ->withErrors(['login' => $e->getMessage()]);
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

    /**
     * Display a listing of the resource.
     * GET /admin/auth
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /admin/auth/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /admin/auth
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /admin/auth/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /admin/auth/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /admin/auth/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /admin/auth/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}