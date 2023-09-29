<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function indexTextEditorall()
    {
        return view('admin.text.all_text_editor');
    }

    public function textConvertortools()
    {
        return view('admin.text.text-convertor-tools');
    }

    public function plantextConvertortools()
    {
        return view('admin.text.plantext-convertor-tools');
    }

    public function textSmalltools()
    {
        return view('admin.text.small-text-tools');
    }

    public function textWidetools()
    {
        return view('admin.text.wide-text_tools');
    }

    public function textStrikethroughtools()
    {
        return view('admin.text.strikethrough-text-tools');
    }

    public function textReversetools()
    {
        return view('admin.text.reverse-text-tools');
    }

    public function textTitleCasetools()
    {
        return view('admin.text.title-case-tools');
    }
    public function textBinarycodetools()
    {
        return view('admin.text.binary-code-tools');
    }
    public function textMorsecodetools()
    {
        return view('admin.text.morse-code-tools');
    }
    public function textItalictools()
    {
        return view('admin.text.italic-text-tools');
    }
    public function textBoldtools()
    {
        return view('admin.text.bold_text_tools');
    }

    public function textSocialtools()
    {
        return view('admin.facebook.facebook_font_tools');
    }

    public function textBubbletools()
    {
        return view('admin.facebook.bubble_text_tools');
    }
}
