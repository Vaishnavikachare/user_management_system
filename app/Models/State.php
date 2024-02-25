<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
	protected $table = 'state';
	// Define relationship with country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Define relationship with cities
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
