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
     * @return Response
     */
    public function store(DocumentRequest $request)
    {
        // TODO: authorization
        $document = Document::updateOrCreate(
            [
                'id' => $request->input('id'),
                'type' => $request->input('type')
            ],
            $request->all());
        return $document->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param String $type
     * @return Response
     */
    public function fetchLatest(String $type)
    {
        return Document::latest()
            ->where('type', $type)
            ->first();
    }
}