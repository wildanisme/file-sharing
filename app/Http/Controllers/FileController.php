<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
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

    public function fileIndex()
    {
        $files = File::all();

        return \response()->view('file.index',[
            'files' => $files
        ]);
    }

    public function file(File $file)
    {
        $file->incrementViews();
        return view('file.files', [
            'file' => $file
        ]);
    }

    public function download(File $file)
    {
        $header = [
            'Content-Disposition' => 'attachment; filename="'.$file->filename.'"'
        ];

        return Response::make(Storage::disk('storage')->get($file->filename), 200, $header);
    }
}
