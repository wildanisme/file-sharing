<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function upload(Request $request, File $file)
    {

        $path = 'public/';
        $requestFile = $request->file('file');
        $extension = $requestFile->getClientOriginalExtension();
        $filename = time() . '-' .  $requestFile->getClientOriginalName();
        $requestFile->storeAs($path, $filename);

        // Insert into table 'file'
        $file->filename     = $filename;
        $file->views        = 0;
        $file->downloads    = 0;
        $file->save();

        return redirect()->route('file', [$file->id]);
    }

    public function file(File $file)
    {

        return view('file.files', [
            'file' => $file
        ]);
    }
}
