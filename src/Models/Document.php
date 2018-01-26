<?php

namespace Sebbaum\Legal\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Document extends Model
{
    public function getTable()
    {
        return config('legal.documents_table');
    }

    protected $fillable = [
        'type',
        'content'
    ];

    public function scopeTos(Builder $builder)
    {
        return $builder->where('type', 'tos');
    }
}