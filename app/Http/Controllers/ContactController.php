<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function __construct(
        protected ContactService $contactService
    ) {}

    public function index()
    {
        return view('pages.contact');
    }

    public function store(ContactRequest $request)
    {
        $this->contactService->store(
            $request->validated()
        );

        return back()->with(
            'success',
            'Your message has been sent successfully.'
        );
    }
}