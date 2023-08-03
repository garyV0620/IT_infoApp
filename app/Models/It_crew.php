<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class It_crew extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'address',
        'education',
        'contact_details',
    ];

    public function documents(){
        return $this->hasMany(It_document::class);
    }
}
