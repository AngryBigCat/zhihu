<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $directory = '';
        $file = '';
        if ($request->hasFile('question_img')) {
            $directory = './question';
            $file = $request->file('question_img');
        } else if ($request->hasFile('answer_img')) {
            $directory = './answer';
            $file = $request->file('answer_img');
        }
        $filename = time().'.'.$file->getClientOriginalExtension();
        if ($file->move($directory, $filename)) {
            return [
                'errno' => 0,
                'data' => [
                    ltrim($directory, '.').'/'.$filename
                ]
            ];
        }
    }
}
