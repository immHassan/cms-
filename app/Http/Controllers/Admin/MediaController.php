<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;   
use Spatie\Permission\Models\Permission;
use File;

class MediaController extends Controller
{
    function __construct()
    {
          $this->middleware('permission:file-manager-read', ['only' => ['index']]);
    }

    function index()
    {
        
        // $images = File::allFiles('storage/');
        return view('admin.media.index');
    }
}
