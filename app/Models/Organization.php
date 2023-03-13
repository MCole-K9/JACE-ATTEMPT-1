<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'street_address',
        'city',
        'zip',
        'state',
        'description',
        'email',
        'phone',
        'website',
        'logo',
    ];

    public function orgReps()
    {
        return $this->hasMany(OrgRep::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
