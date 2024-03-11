<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function file(Request $request){
        $request->validate([
           'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads');

        $newFile = new File();
        $newFile->name = $fileName;
        $newFile->path = $filePath;
        $newFile->save();

        return response()->json(['message' => 'Файл загружен'], 201);
    }
}
