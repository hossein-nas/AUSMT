<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;

class FastMenuController extends Controller {

	public function show()
	{
		$f_menu = getFastMenuItems();
		ksort($f_menu);
		return view('cpanel.pages.fast_menu.show', compact('f_menu'));
	}

	public function store(Request $request)
	{
		$rules = [
			'id'        => 'required|integer|between:0,4',
			'name'      => 'required',
			'href'      => 'required',
			'image'     => 'required',
		];
		$messages = [
			'id.required'        => 'جایگاه مناسب را انتخاب نکردید.',
			'id.between'         => 'جایگاهی که انتخاب کردید از حد متناسب خارج است.',
			'id.integer'         => 'جایگاه مناسب را انتخاب نکردید.',
			'name.required'      => 'عنوان را وارد نکردید.',
			'href.required'      => 'آدرس را وارد نکردید.',
			'image.required'     => 'آیکون را وارد نکردید.',
		];
		$this->validate($request,$rules,$messages);
		addNewItemToFastMenu($request->all());
		return back();
	}

	public function delete(Request $request)
	{
		$rules = [
			'id'        => 'required|integer|between:0,4',
		];
		$messages = [
			'id.required'        => 'جایگاه مناسب را انتخاب نکردید.',
			'id.between'         => 'جایگاهی که انتخاب کردید از حد متناسب خارج است.',
			'id.integer'         => 'جایگاه مناسب را انتخاب نکردید.',
		];
		$this->validate($request,$rules,$messages);
		deleteFastMenuItem($request['id']);
		return response('با موفقیت انجام شد');
	}

}
