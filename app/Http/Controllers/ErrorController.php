<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    
    function internalservererror(Request $request){

        return view('errors.500');

    }

}
