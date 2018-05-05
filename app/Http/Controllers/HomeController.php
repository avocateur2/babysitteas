<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show Home page
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Show Portal page
     *
     * @return \Illuminate\Http\Response
     */
    public function portal()
    {
      if(Auth::check()) {
        $response = redirect()->route('login');
      } else {
        $response = view('portal');
      }

      return $response;
    }
}
