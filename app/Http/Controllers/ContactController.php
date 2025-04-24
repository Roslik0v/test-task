<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^(\+7|8)\d{10}$/'],
            'email' => [
                'required',
                'email',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
        ]);

        $contact = Contact::create($validated);

        Mail::raw("Имя: {$contact->name}\nТелефон: {$contact->phone}\nEmail: {$contact->email}", function ($message) {
            $message->to('roslikovsemen@gmail.com')->subject('Новая заявка с формы');
        });

        return response()->json(['success' => true]);
    }
}

