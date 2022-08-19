<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $table = 'competitions';
    protected $fillable = [
        'title',
        'date',
        'address_1',
        'address_2',
        'town_city',
        'postcode',
        'notes'
    ];

    public function ownedBy(User $user)
    {
        return $user->id === $this->user_id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

// Format date for storing in DB
function setDobAttribute($value)
{
    $this->attributes['date'] = Card::createFromFormat('d/m/Y', $value)->format('Y-m-d');
}
