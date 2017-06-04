<?php

namespace Modules\Analytics\Http\Controllers;

use App\Http\Controllers\Controller;

class AnalyticsController extends Controller
{
	public function index()
	{
		return view('analytics::index');
	}
}
