<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WatsonResult extends Model
{
    use SoftDeletes;
    protected $table = 'watson_results';
    protected $fillable = [
        'sentence',
        'observation',
        'agreed',
        'document_tone',
        'sentences_tone',
    ];

    public $storeRequestRules = [
        'sentence' => 'required|string|max:255',
    ];
    public $updateRequestRules = [
        'observation' => 'nullable|string|max:255',
        'agreed' => 'nullable|boolean',
    ];

    // Mutators
    public function setDocumentToneAttribute($value)
    {
        $this->attributes['document_tone'] = empty($value) ? null : json_encode($value);
    }

    public function setSentencesToneAttribute($value)
    {
        $this->attributes['sentences_tone'] = empty($value) ? null : json_encode($value);
    }

    public function setAgreedAttribute($value)
    {
        $this->attributes['agreed'] = is_null($value) ? null : $value;
    }

    // Accessors
    public function getDocumentToneAttribute($value)
    {
        return empty($value) ? null : json_decode($value);
    }

    public function getSentencesToneAttribute($value)
    {
        return empty($value) ? null : json_decode($value);
    }
}
