<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use  App\Models\Management;
use Illuminate\Support\Facades\Hash;

class ManagementController extends Controller
{
    //
    function create(){

        return view::make('management.create');
    }
    function store(Request $req)
    {
        $req->validate([
            'name' => 'required|min:3|max:10|alpha',
            'email' => 'required|min:4|max:30|regex:/[@!$%]/',
            'password' => 'required|min:4|max:10|regex:/[@!$%]/',
            'age' => 'required',
            'phoneNumber' => 'required|digits-between:10,15',
            'address'=> 'required',
            'state' => 'required',
            'pincode' => 'required|max:6',
           
            
        ],[
            'name.required' => 'Name is Required',
            'name.min' => 'Name should be atleast :min characters',
            'name.max' => 'Name should not be greater than :max characters',
            'name.alpha' => 'Special character is not required',
            'email.required' => 'Email is Required',
            'email.min' => 'Email should  have atleast :min characters',
            'email.max' => 'Email should not be greater than :max characters',
            'email.regex' => 'Special character is required',
            'password.required' => 'Password is Required',
            'password.min' => 'Password should  have atleast :min characters',
            'password.max' => 'password should not be greater than :max characters',
            'password.regex' => 'Special character is required',
            'age.required' => 'Age is Required',
            'phoneNumber.required' => 'PhoneNumber is Required',
            'phoneNumber.digits' => 'Not a valid PhoneNumber',
            'address.required' => 'Address is Required',
            'state.required' => 'State is required',
            'pincode.required' => 'Pincode is required',
            'pincode.max' => 'pincode should not be greater than :max characters',
            
        ]);
        $management = new Management;
        $management->name = $req->name;
        $management->email = $req->email;
        $management->password =  Hash::make($req->password);
        $management->age = $req->age;
        $management->phoneNumber = $req->phoneNumber;
        $management->address = $req->address; 
        $management->state = $req->state;
        $management->pincode = $req->pincode;
        $management->save();
        return redirect()->route('list.management')->with("success",'Updated Successfully');
        
    }
    function list(){
        $user = Management::all();
        return view::make('management.list',['users'=>$user]);

    }
    function edit($id){
        $users = Management::find($id);
        return view::make('management.edit',['user'=> $users]);
    }
    function update(Request $req, $id){
        $req->validate([
            'name' => 'required|min:6|max:10|alpha',
            'email' => 'required|regex:/[@!$%]/',
            'password' => 'required|min:4|max:10|regex:/[@!$%]/',
            'age' => 'required',
            'phoneNumber' => 'required|digits-between:10,15',
            'address'=> 'required',
            'state' => 'required',
            'pincode' => 'required|max:6',
           
            
        ],[
            'name.required' => 'FirstName is Required',
            'name.min' => 'Name should be atleast :min characters',
            'name.max' => 'Name should not be greater than :max characters',
            'name.alpha' => 'Special character is not required',
            'email.required' => 'Email is Required',
            'email.min' => 'Email should  have atleast :min characters',
            'email.max' => 'Email should not be greater than :max characters',
            'email.regex' => 'Special character is required',
            'password.required' => 'Password is Required',
            'password.min' => 'Password should  have atleast :min characters',
            'password.max' => 'password should not be greater than :max characters',
            'password.regex' => 'Special character is required',
            'age.required' => 'Age is Required',
            'phoneNumber' => 'PhoneNumber is Required',
            'phoneNumber.digits' => 'Not a valid PhoneNumber',
            'address.required' => 'Address is Required',
            'state.required' => 'State is required',
            'pincode.required' => 'Pincode is required',
            'pincode.max' => 'pincode should not be greater than :max characters',
            
        ]);
        $management = Management::find($id);
        $management->name = $req->name;
        $management->email = $req->email;
        $management->password = Hash::make($req->password);
        $management->age = $req->age;
        $management->phoneNumber = $req->phoneNumber;
        $management->address = $req->address; 
        $management->state = $req->state;
        $management->pincode = $req->pincode;
        $management->save();
        return redirect()->route('list.management')->with("success",'Updated Successfully');

        
    }
    function destroy($id){
        $management = Management::find($id);
        if(!empty($management)){
        $management->delete();
        }
        return redirect()->route('list.management')->with("success",'file is deleted');
        }


}

