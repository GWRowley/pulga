<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = [
        'name',
        'user_id',
        'surname',
        'dob',
        'gender',
        'belt',
        'membership',
        'member_since',
        'emergency_contact',
        'emergency_number',
        'medical_information'
    ];

    // https://laracasts.com/series/laravel-8-from-scratch/episodes/24
    // No idea if I need these 2 lines...
    public function userId() {
        return $this->belongsTo(User::class);
    }
}
// Format date of birth for storing in DB
function setDobAttribute($value)
{
    $this->attributes['dob'] = Card::createFromFormat('d/m/Y', $value)->format('Y-m-d');
}

// Format member since for storing in DB
function setMemberSinceAttribute($value)
{
    $this->attributes['member_since'] = Card::createFromFormat('d/m/Y', $value)->format('Y-m-d');
}

// Convert date of birth to age
function age()
{
    return Carbon::parse($this->attributes['dob'])->age;
}