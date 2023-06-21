<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotFoundController extends Controller
{
    public function show(Request $request)
    {
        $message = [
           "message" => "Page Not Found!"
        ];
        return response()->view('errors.404',$message, 404);
    }
}
