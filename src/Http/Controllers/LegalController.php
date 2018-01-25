<?php

namespace Sebbaum\Legal\Http\Controllers;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Routing\Controller;
use Sebbaum\Legal\Models\Document;

// TODO: introduce document types
class LegalController extends Controller
{
    public function tos()
    {
        $document = Document::latest()->first();
        $content = Markdown::convertToHtml($document->content);
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
