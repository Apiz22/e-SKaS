<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardEvidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', //FK
        'link',
        'type',
        'sub',
        'note',
        'status',
        // 'sub_id'
    ];

    protected $table='standard';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function subeviden()
    // {
    //     return $this->hasMany(SubEviden::class);
    // }
}
