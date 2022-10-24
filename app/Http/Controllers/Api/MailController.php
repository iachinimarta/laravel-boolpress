<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\NewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function provaFunzione(Request $request) {

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        };

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('iachinimarta@gmail.com')->send(new NewMail($newLead));

        return response()->json([
            'success' => true
        ]);
    }
}
