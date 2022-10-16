<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Modules\Contact\Models\Contact;
use Modules\Contact\Repositories\ContactRepoEloquent;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Responses\AjaxResponses;

class ContactController extends Controller
{
    private string $class = Contact::class;
    protected ContactRepoEloquent $repo;

    public function __construct(ContactRepoEloquent $contactRepo)
    {
        $this->repo = $contactRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('manage', $this->class);
        return view('Contact::index', ['contacts' => $this->repo->getLatest()->notRead()->paginate()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Contact $contact
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws \Throwable
     */
    public function destroy(Contact $contact)
    {
        $this->authorize('manage', $this->class);
        $contact->deleteOrFail();

        return AjaxResponses::SuccessResponse();
    }
}
