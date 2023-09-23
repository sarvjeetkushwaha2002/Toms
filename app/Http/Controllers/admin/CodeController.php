<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CodeController extends Controller
{
    public function textBycripttools()
    {
        return view('admin.text.bycript_code_tools');
    }

    public function textEncriptchange(Request $request)
    {
        try {
            if ($request->chang_by_encript != null) {
                $chang_by_encript = Hash::make($request->chang_by_encript);
            } else {
                $chang_by_encript = 'Please Enter the String !';
            }
            return $chang_by_encript;
        } catch (Exception $ex) {
            dd($ex->getMessage());
        }
    }

    public function textEncriptcheck(Request $request)
    {
        try {
            if ($request->chang_by_encript1 != null && $request->encript_code != null) {
                $checked = Hash::check($request->chang_by_encript1, $request->encript_code);
                if ($checked == true) {
                    $chang_by_encript = 'Matched Successfully !';
                } else {
                    $chang_by_encript = 'Not Match Successfully !';
                }
            } else {
                $chang_by_encript = 'Please Fill The Fileds !';
            }
            return $chang_by_encript;
        } catch (Exception $ex) {
            dd($ex->getMessage());
        }
    }
}
