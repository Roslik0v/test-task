<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\ContactService;

class ContactController extends Controller
{
    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function store(ContactRequest $request)
    {
        $validated = $request->validated();

        $contact = Contact::create($validated);

        $this->contactService->notifyAdmin($contact);

        return response()->json(['success' => true]);
    }
}


