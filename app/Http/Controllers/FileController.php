<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,docx,csv,txt,xlx,xls,pdf|max:8192'
        ]);


        $fileData = new File();
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $fileSize = $request->file('file')->getSize();

            // get size in MB
            $fileSizeMB = ($fileSize / 1024 / 1024);
            $fileSizeMB = number_format($fileSizeMB, 2);

            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $fileData->name = $request->name;
            $fileData->file_size = $fileSizeMB;
            $fileData->file_format = $request->file('file')->getClientOriginalExtension();
            $fileData->file_path = '/storage/' . $filePath;
            $fileData->user_id = Auth::user()->id;
            $fileData->save();
            return back()->with('success', 'File Upload Successful')->with('file', $fileName);
        }
    }
}
