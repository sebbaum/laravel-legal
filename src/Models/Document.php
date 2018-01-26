<?php

namespace Sebbaum\Legal\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function getTable()
    {
        return config('legal.documents_table');
    }


    protected $fillable = [
        'content'
    ];
}