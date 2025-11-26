<?php

namespace DazzaDev\LaravelDgtCr\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DgtDocument extends Model
{
    use SoftDeletes;

    protected $casts = [
        'success' => 'boolean',
        'messages' => 'array',
    ];

    protected $fillable = [
        'document_type',
        'document_key',
        'success',
        'status',
        'messages',
        'xml_base64',
        'documentable_id',
        'documentable_type',
    ];

    public function documentable(): MorphTo
    {
        return $this->morphTo();
    }
}
