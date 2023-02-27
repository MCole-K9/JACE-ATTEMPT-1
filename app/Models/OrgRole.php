<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function orgRep()
    {
        return $this->hasMany(OrgRep::class);
    }
}
