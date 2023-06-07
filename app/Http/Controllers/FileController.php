<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $path = 'public/';
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '-' .  $file->getClientOriginalName();
        $file->storeAs($path, $filename);

        return redirect('/home')->with('success','Data berhasil diupload');
    }
}
