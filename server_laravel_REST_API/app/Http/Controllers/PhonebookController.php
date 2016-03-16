<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Response;
use App\Phonebook;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PhonebookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Phonebook::all();
        if (empty($data)) {
            return Response::json([
                'error' => 'Not Found'
            ], 404);
        } 
        else
        {
            return Response::json($data , 200);    
        }
    }
 

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        if ($data = Phonebook::create($request->all())) {
            return Response::json($data , 201);
        } else { 
            return Response::json(['error'=>"Not saved"] , 501);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
       $data = Phonebook::findOrFail($id);  

        if ($data) {
            return Response::json($data , 203);
        } else { 
            return Response::json(['error'=>"Not saved"] , 404);
        }
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $data = Phonebook::findOrFail($id);
        if($data)
        {
            $data->update($request->all());
            return Response::json($data , 200);
        }
        else
        {
            return Response::json($data , 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $data = Phonebook::findOrFail($id);
        if ($data) {
            Phonebook::destroy($id);
            return Response::json(['ok'] , 204);
        } else { 
            return Response::json(['error'=>"Not found"] , 404);
        }
    }

}
