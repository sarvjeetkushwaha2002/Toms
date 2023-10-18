<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CodeController extends Controller
{
    public function randomPasswordtools()
    {
        return view('admin.textsecond.password_maker_tool');
    }
    public function textToUtf8Encodetools()
    {
        return view('admin.textsecond.utf8_encode_tool');
    }

    public function utf8encodeToutf8decodetools()
    {
        return view('admin.textsecond.utf8_decode_tool');
    }

    public function jsonToCsvtools()
    {
        return view('admin.textsecond.json_to_csv_tool');
    }
    public function csvToJsontools()
    {
        return view('admin.textsecond.csv_to_json_tool');
    }
    public function underLinetools()
    {
        return view('admin.text.under_line_tool');
    }
    public function slugifyUrltools()
    {
        return view('admin.textsecond.slugify_url_tool');
    }
    public function jsonStringifytools()
    {
        return view('admin.textsecond.json_stringify_tool');
    }
    public function textToSpeechtools()
    {
        return view('admin.textsecond.text_to_speech_tools');
    }
    public function imageResizetools()
    {
        return view('admin.image.image_resize');
    }
    public function colorCodePicktools()
    {
        return view('admin.color.color_generator');
    }

    public function textFindreplacetools()
    {
        return view('admin.text.find_replace_text');
    }

    public function allcodeDatatransalator()
    {
        return view('admin.text.all_code_data_translator');
    }

    public function textBycripttools()
    {
        return view('admin.text.bycript_code_tools');
    }

    public function textHexcodetools()
    {
        return view('admin.text.hex-code-tools');
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
