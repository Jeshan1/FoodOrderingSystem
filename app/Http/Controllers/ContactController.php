<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\services\ContactService;
// use RealRashid\SweetAlert\Facades\Alert;
Use Alert;



class ContactController extends Controller
{
    private $contactService;
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactService->findAll();
        return view('pages.contactus.showcontactadmin',compact('contacts'));

    }

    public function create()
    {
        return view('pages.contactus.create');
    }

    public function store(ContactRequest $request)
    {
        $response = $this->contactService->addContactUsDetail($request);
        Alert::toast($response['message'],$response['status']);
        return redirect(route('main'));
    }

    public function show($id)
    {
        $contact = $this->contactService->findById($id);
        return view('pages.contactus.showcontact',compact('contact'));
    }


    
}
