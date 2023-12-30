<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function upload(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'filename'  => 'string',
            'file'      => 'file'
        ]);

        $path = 'public/';
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '-' .  $file->getClientOriginalName();
        $file->storeAs($path, $filename);

        return redirect('/home')->with('success','Data berhasil diupload');
    }
}
