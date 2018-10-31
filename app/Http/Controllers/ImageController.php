<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display pagination image.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return Image::paginate(4);
	}

	/**
	 * Upload image and add name image to data base.
	 */
	public function update(Request $request) {

		if ($request->hasfile('image')) {
			foreach ($request->file('image') as $file) {
				$name = $file->getClientOriginalName();
				$file->move(public_path() . '/uploads/', $name);
				$image = new Image(['url' => $name]);
				$image->save();
			}
			return redirect()->back();
		}
		else{
			return redirect()->back();
		}
	}
}
