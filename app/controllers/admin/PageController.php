<?php

namespace App\Controllers\Admin;

use Page;
use Input, Notification, Redirect, Sentry;

use App\Services\Validators\PageValidator;

class PageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin/page
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return \View::make('admin.pages.index')
                    ->With('pages', Page::all());
	}

    /**
     * Display the specified resource.
     * GET /admin/page/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $page = Page::find($id);
        $user = Sentry::findUserById($page->user_id);
        return \View::make('admin.pages.show')
                        ->with([
                            'page'      =>  $page,
                            'author'    =>  $user->first_name.' '.$user->last_name,
                        ]);
    }

    /**
	 * Show the form for creating a new resource.
	 * GET /admin/page/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return \View::make('admin.pages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/page
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $validation = new PageValidator();
        if ($validation->passes())
        {
            $page = new Page();
            $page->title = Input::get('title');
            $page->body = Input::get('body');
            $page->user_id = Sentry::getUser()->id;
            $page->save();

            Notification::success('新增頁面成功！');

            return Redirect::route('admin.pages.edit', $page->id);
        }
        return Redirect::back()
                        ->withInput()
                        ->withErrors($validation->errors);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/page/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        return \View::make('admin.pages.edit')
                    ->with('page', Page::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/page/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        $validation = new PageValidator();

        if ($validation->passes())
        {
            $page           =   Page::find($id);
            $page->title    =   Input::get('title');
            $page->body     =   Input::get('body');
            $page->user_id  =   Sentry::getUser()->id;
            $page->save();

            Notification::success('頁面更新成功！');

            return Redirect::route('admin.pages.edit', $page->id);
        }

        return Redirect::back()
                        ->withInput()
                        ->withErrors($validation->errors);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/page/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        $page = Page::find($id);
        $page->delete();

        Notification::success('刪除成功！');
        return Redirect::route('admin.pages.index');
	}

}