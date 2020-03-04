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
        'sentences_tone'
    ];

    public $storeRequestRules = [
        'sentence' => 'required|string|max:255'
    ];
    public $updateRequestRules = [
        'sentence' => 'required|string|max:255'
    ];
}
