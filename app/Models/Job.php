<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'requirements',
        'salary',
        'is_visible',
        'open_date',
        'close_date',
        'type',
        'org_rep_id',
        'organization_id',
        'job_category_id'
    ];

    public function orgRep()
    {
        return $this->belongsTo(OrgRep::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
