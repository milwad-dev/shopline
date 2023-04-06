<?php

namespace Modules\Home\Http\Controllers\Contact;

use Illuminate\Http\RedirectResponse;
use Modules\Home\Http\Requests\Contact\ContactRequest;
use Modules\Home\Services\Contact\ContactService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class ContactController extends Controller
{
    /**
     * Show create contact page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('Home::Pages.contacts.create');
    }

    /**
     * Store contact by request.
     *
     * @param ContactRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ContactRequest $request)
    {
        resolve(ContactService::class)->store($request->all());

        ShareService::successToast('Contact created successfully');

        return to_route('contacts.create');
    }
}
