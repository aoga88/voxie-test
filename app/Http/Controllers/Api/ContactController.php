<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\ContactService;

class ContactController extends Controller
{
    /**
     * @var ContactService
     */
    private $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function getList(Request $request)
    {
        return response()->json($this->contactService->findContacts());
    }

    public function create(Request $request)
    {
        return response()->json($this->contactService->create(
            $request->get('name'), $request->get('email')
        ));
    }

    public function remove(Request $request, $id)
    {
        $this->contactService->remove($id);
    }
}
