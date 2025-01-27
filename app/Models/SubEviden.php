<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubEviden extends Model
{
    //
    protected $fillable = [
        // 'standard_id',
        'description',
        'type',
        
    ];


    protected $table = 'sub_type';
    public function standardevidence()
    {
        return $this->belongsTo(StandardEvidence::class);
    }
}


