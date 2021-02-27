<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,jpg,csv,txt,xlx,xls,pdf|max:8192'
        ]);

        $fileData = new File();
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $fileData->name = time() . '_' . $request->file->getClientOriginalName();
            $fileData->file_path = '/storage/' . $filePath;
            $fileData->save();
            return back()->with('success', 'File Upload Successful')->with('file', $fileName);
        }
    }
}
