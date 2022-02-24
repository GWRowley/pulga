<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = [
        'name',
        'surname',
        'dob',
        'gender',
        'emergencyContact',
        'emergencyNumber',
        'medicalInformation',
        'belt',
        'membership',
        'memberSince'
    ];
}
// Format date of birth for storing in DB
function setDobAttribute($value)
{
    $this->attributes['dob'] = Card::createFromFormat('d/m/Y', $value)->format('Y-m-d');
}

// Format member since for storing in DB
function setMemberSinceAttribute($value)
{
    $this->attributes['memberSince'] = Card::createFromFormat('d/m/Y', $value)->format('Y-m-d');
}
