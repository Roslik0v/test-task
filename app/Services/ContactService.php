<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    public function notifyAdmin(Contact $contact): void
    {
        $message = sprintf(
            "Имя: %s\nТелефон: %s\nEmail: %s",
            $contact->name,
            $contact->phone,
            $contact->email
        );

        $adminEmail = config('custom.admin_email');

        Mail::raw($message, function ($mail) use ($adminEmail) {
            $mail->to($adminEmail)->subject('Новая заявка с формы');
        });
    }
}
