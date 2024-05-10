<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userdatacontroller extends Controller
{
    public function index()
    {
        if (session('isAdmin')) {
            return view('userdata');
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
