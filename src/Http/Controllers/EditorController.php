<?php

namespace Sebbaum\Legal\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Sebbaum\Legal\Models\Document;
use Sebbaum\Legal\Http\Requests\DocumentRequest;

class EditorController extends Controller
{
    /**
     * Store a new document
     *
     * @param DocumentRequest $request
     * @return Response
     */
    public function store(DocumentRequest $request)
    {
        $document = Document::updateOrCreate(
            [
                'id' => $request->input('id'),
                'type' => $request->input('type')
            ],
            $request->all());
        return $document->toArray();
    }

    /**
     * Fetch the latest version of the given legal document type.
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
