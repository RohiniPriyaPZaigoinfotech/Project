<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use  App\Models\Management;

class ManagementController extends Controller
{
    //
    function create(){

        return view::make('management.create');
    }
    function store(Request $req)
    {
        $req->validate([
            'name' => 'required|min:6|max:10',
            'email' => 'required',
            'age' => 'required',
            'phoneNumber' => 'required|digits-between:9,11',
            'address'=> 'required',
           
            
        ],[
            'name.required' => 'FirstName is Required',
            'name.min' => 'Name should be atleast :min characters',
            'name.max' => 'Name should not be greater than :max characters',
            'email.required' => 'Email is Required',
            'age.required' => 'Age is Required',
            'phoneNumber' => 'PhoneNumber is Required',
            'phoneNumber.digits' => 'Not a valid PhoneNumber',
            'address.required' => 'Address is Required',
            
        ]);
        $management = new Management;
        $management->name = $req->name;
        $management->email = $req->email;
        $management->age = $req->age;
        $management->phoneNumber = $req->phoneNumber;
        $management->address = $req->address; 
        $management->save();
        
    }
}
