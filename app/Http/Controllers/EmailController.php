<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;

class EmailController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        $message = $request->input('message');

        try {
            Mail::to('Admin@example.com')->send(new ContactEmail($message));
            return view('success');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
