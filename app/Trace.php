<?php

namespace App;

use App\Deal;
use App\Sequence;
use Illuminate\Database\Eloquent\Model;

class Trace extends Model
{
    protected $fillable = [
        'thesis_id', 'sequence_id', 'date', 'document', 'filename'
    ];

    protected $appends = ['deal'];

    public function getDealAttribute()
    {
    	return Sequence::findOrFail($this->sequence_id)->deal;
    }

    




}
