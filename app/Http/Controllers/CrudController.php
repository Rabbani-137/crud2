<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Session;


class CrudController extends Controller
{
    public function showData(){
        // $showData = Crud::all(); to show all data
        // $showData = Crud::paginate(5);
        $showData = Crud::simplepaginate(5);
        return view('show_Data', compact('showData'));
    }

    public function addData(){
        return view('add_Data');
    }

    public function storeData(Request $request){
        $rules = [
            'name'=> 'required | max:10',
            'email'=>'required | email'
        ];

        $cm = [
            'name.required'=>'Enter Your name',
            'name.max'=>'Your name can not contain more than 10 ch',
            'email.required'=>'Enter Your email',
            'email.email'=>'Email must be a valid email'
        ];
        $this->validate($request,$rules);

        $crud = new Crud();
        $crud -> name = $request->name;
        $crud -> email = $request -> email;
        $crud -> save();
        Session::flash('msg','Data successfully Added');
        return redirect('/');
    }

    public function editData($id=null){
        $editData = Crud::find($id);
        return view('edit_data',compact('editData'));
        
    }

    public function updateData(Request $request, $id){
        $rules = [
            'name'=> 'required | max:10',
            'email'=>'required | email'
        ];

        $cm = [
            'name.required'=>'Enter Your name',
            'name.max'=>'Your name can not contain more than 10 ch',
            'email.required'=>'Enter Your email',
            'email.email'=>'Email must be a valid email'
        ];
        $this->validate($request,$rules);

        $crud = Crud::find($id);
        $crud -> name = $request->name;
        $crud -> email = $request -> email;
        $crud -> save();
        Session::flash('msg','Data successfully Updated');
        return redirect('/');
    }

    public function deleteData($id=null){
        $deleteData = Crud::find($id);
        $deleteData->delete();
        Session::flash('msg','Data successfully Deleted');
        return redirect('/');
    }

}