<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function __construct(
        protected ContactService $contactService
    ) {
    }

    public function index()
    {
        return redirect()
            ->route('home')
            ->withFragment('contact');
    }

    public function store(ContactRequest $request)
    {
        $this->contactService->store(
            $request->validated()
        );

        return redirect()->back()
            ->withFragment('contact')
            ->with('success', 'Message sent successfully.');
    }
}
