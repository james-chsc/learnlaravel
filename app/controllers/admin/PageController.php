<?php

namespace App\Controllers\Admin;

use Page;
use Input, Notification, Redirect, Sentry, Str;

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
        return \View::make('admin.pages.show')
            ->With('page', Page::find($id))
            ->WithAuthor(Sentry::findUserById(Page::findId($Id)->user_id)->name);
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
	}

}