<?php

namespace Sebbaum\Legal\Http\Controllers;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Routing\Controller;
use Sebbaum\Legal\Models\Document;

class LegalController extends Controller
{
    public function tos()
    {
        $content = '';

        $document = Document::latest()
            ->tos()
            ->first();
        if (!is_null($document)) {
            $content = Markdown::convertToHtml($document->content);
        }

        return view('legal::tos', ['content' => $content]);
    }

    public function pripol()
    {
        $content = '';

        $document = Document::latest()
            ->pripol()
            ->first();

        if (!is_null($document)) {
            $content = Markdown::convertToHtml($document->content);
        }

        return view('legal::pripol', ['content' => $content]);
    }

    public function imprint()
    {
        $content = '';

        $document = Document::latest()
            ->imprint()
            ->first();

        if (!is_null($document)) {
            $content = Markdown::convertToHtml($document->content);
        }

        return view('legal::imprint', ['content' => $content]);
    }
}
