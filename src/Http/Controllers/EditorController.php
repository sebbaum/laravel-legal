<?php

namespace Sebbaum\Legal\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Sebbaum\Legal\Models\Document;
use Sebbaum\Legal\Http\Requests\DocumentRequest;

class EditorController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param DocumentRequest $request
     * @return void
     */
    public function store(DocumentRequest $request)
    {
        Document::create($request->validated());
        // TODO: authorization
        // TODO: persist
        // TODO: response
    }

    /**
     * Display the specified resource.
     *
     * @param Document $doc
     * @return void
     */
    public function get(Document $doc)
    {
        // TODO: authorization
        // TODO: fetch
        // TODO: response
    }
}
