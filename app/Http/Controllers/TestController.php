<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function multilanguage()
    {
        return view('test-multilanguage');
    }

    public function phpinfo()
    {
        return phpinfo();
    }
}
