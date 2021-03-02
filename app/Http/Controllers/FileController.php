<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'description' => 'required|max:200',
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,docx,csv,txt,xlx,xls,pdf|max:8192'
        ]);


        $fileData = new File();
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $fileSize = $request->file('file')->getSize();

            // get size in MB
            $fileSizeMB = ($fileSize / 1024 / 1024);
            $fileSizeMB = number_format($fileSizeMB, 2);

            $filePath = $request->file('file')->storeAs('uploads', $fileName);
            // $filePath = $request->file->move(public_path('upload'), $fileName);

            $fileData->name = $request->name;
            $fileData->description = $request->description;
            $fileData->file_size = $fileSizeMB;
            $fileData->file_format = $request->file('file')->getClientOriginalExtension();
            // $fileData->file_path = '/storage/' . $filePath;
            $fileData->file_path = $filePath;
            $fileData->user_id = Auth::user()->id;
            $fileData->save();
            return redirect('home')->with('success', 'File Upload Successful');
        }
    }

    public function show($id)
    {
        $file = File::findOrFail($id);

        return view('files.show')->with('file', $file);
    }

    public function edit($id)
    {
    }
    public function delete($id)
    {

        $file = File::findOrFail($id);
        $pathToFile = storage_path('app/' . $file->file_path);
        if ($file->delete()) {

            if (file_exists($pathToFile)) {
                unlink($pathToFile);
            } else {
                dd('File does not exists.');
            }
        }
        return redirect('home')->with('success', 'File Deleted!');
    }
    public function download($id)
    {
        $file = File::findOrFail($id);
        $filePath = $file->file_path;
        $pathToFile = storage_path('app/' . $file->file_path);
        return response()->download($pathToFile, $file->name);
    }
}
