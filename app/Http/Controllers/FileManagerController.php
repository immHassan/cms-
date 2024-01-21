<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
class FileManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('filemanager');
    }
    public function store(Request $request){
        dd($request);
    }
}