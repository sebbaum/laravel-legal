<?php

namespace Sebbaum\Legal\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Document extends Model
{
    /*
     * Get the configurable table name of this Model.
     * The Table name can be configured in legal.php
     */
    public function getTable()
    {
        return config('legal.documents_table');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'content'
    ];

    /**
     * Scope to query only tos documents.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function scopeTos(Builder $builder)
    {
        return $builder->where('type', 'tos');
    }

    /**
     * Scope to query only privacy policy (pripol) documents.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function scopePripol(Builder $builder)
    {
        return $builder->where('type', 'pripol');
    }

    /**
     * Scope to query only imprint documents.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function scopeImprint(Builder $builder)
    {
        return $builder->where('type', 'imprint');
    }
}