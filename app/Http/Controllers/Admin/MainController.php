<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class MainController extends Controller
{
	public function index()
	{
		return view('admin.index');
	}
}
