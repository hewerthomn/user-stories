<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * dashboard
     *
     * @return Response
     */
    public function dashboard()
    {
        $v['title'] = 'Dashboard';

        return view('home.dashboard', $v);
    }
}
