<?php

namespace App\services;
use App\Models\Contact;

Class ContactService
{
    public function findAll()
    {
        return Contact::all();
    }



    public function addContactUsDetail($request)
    {

        // $inputs = $request->all();
        // dd($inputs);

        try {

            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "message" => $request->message
            ];

            Contact::create($data);
            
             $response = [
                'status' => 'success',
                'message' => "Your Query Submitted"
            ];

        } catch (\Throwable $e) {
            $response = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
        return $response;
    }

    public function findById($id)
    {
        return Contact::find($id);
    }
}



?>