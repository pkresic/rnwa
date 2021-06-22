<?php

namespace App\Http\Controllers;

use App\Models\Address;

class AddressController extends Controller
{

    public function index()
    {
        return view('pages.address.list')
            ->with([
                'addresses' => Address::all(),
            ]);
    }

    public function details($id)
    {
        return view('pages.address.details')
            ->with([
                'address' => Address::query()->findOrFail($id),
            ]);
    }
}
