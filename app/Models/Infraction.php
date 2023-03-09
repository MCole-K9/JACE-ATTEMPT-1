<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Infraction extends Model
{   
    use HasFactory;
    use LogsActivity;

    protected $table = 'infractions';

    protected $fillable = ['reason'];


}
