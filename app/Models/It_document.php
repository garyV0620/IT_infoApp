<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class It_document extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'document_number',
        'date_issued',
        'date_expiry',
        'remarks',
        'it_crew_id',
    ];

    public function crew(){
        return $this->belongsTo(It_crew::class);
    }
}
