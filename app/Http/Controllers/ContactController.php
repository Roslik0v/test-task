<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $validated = $request->validated();

        $contact = Contact::create($validated);

        Mail::raw("Имя: {$contact->name}\nТелефон: {$contact->phone}\nEmail: {$contact->email}", function ($message) {
            $message->to('roslikovsemen@gmail.com')->subject('Новая заявка с формы');
        });

        return response()->json(['success' => true]);
    }
}

