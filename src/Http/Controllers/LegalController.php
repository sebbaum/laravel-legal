<?php

namespace Sebbaum\Legal\Http\Controllers;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Routing\Controller;
use Sebbaum\Legal\Models\Document;

// TODO: need refactioring
class LegalController extends Controller
{
    /**
     * Show the latest Terms of Service.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Show the latest privacy policy.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Show the latest imprint.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
