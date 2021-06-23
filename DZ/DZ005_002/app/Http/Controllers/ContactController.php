<?php


namespace App\Http\Controllers;


use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact.list')
            ->with([
                'contacts' => Contact::all(),
            ]);
    }

    public function details($id)
    {
        return view('pages.contact.details')
            ->with([
                'contact' => Contact::query()->findOrFail($id),
            ]);
    }
}
