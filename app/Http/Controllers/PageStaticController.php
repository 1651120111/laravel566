<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageStaticController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function  aboutUs(){
        return view('static.about');
    }
}
