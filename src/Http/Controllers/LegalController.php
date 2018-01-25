<?php

namespace Sebbaum\Legal\Http\Controllers;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Routing\Controller;

class LegalController extends Controller
{
    public function tos()
    {
        $content = Markdown::convertToHtml('# Markdown from **server**');
        return view('legal::tos', ['content' => $content]);
    }

    public function pripol()
    {
        return view('legal::pripol');
    }

    public function imprint()
    {
        return view('legal::imprint');
    }
}
