<?php

namespace App\Http\Controllers;
use app\user;

use App\issueees;
use Illuminate\Http\Request;
use App\Imports\IssueeesImport;
use App\Mail\IssueRequestSubmited;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class IsuuesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['test']);
    }

 public function store(Request $request){

   $issueees = new issueees();
   $issueees->name =$request->name ;
   $issueees->email=$request->email;
   $issueees->phone =$request->phone;
   $issueees->msg =$request->msg;
   $issueees->user_id=Auth::user()->id;
   $issueees->attachment =null;
   $issueees->building_no =$request->building_no;
   $issueees->apartment_number =$request->apartment_number;

   $issueees->save();


   \Mail::to($request->email)->send(new IssueRequestSubmited($issueees));
   return "record is created successfully";

 }

 public function test(){
    return "This is function test";
 }
public function list(){
     //$data['Issueees'] =Issueees::all();

     $data['users'] =user::all();
    return view ('issues.list', $data);
}
Public function importFromExcel (Request $request){

    // validate file

    Excel::import(new IssueeesImport,$request->ExcelFile);
    return "Data imported Successfully";
}
}
