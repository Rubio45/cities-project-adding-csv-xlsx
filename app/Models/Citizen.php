<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    protected $fillable = ['first_name', 'last_name', 'gender', 'birth_date', 'city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getCity()
    {
        return $this->city->name ?? 'No city assigned';
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
