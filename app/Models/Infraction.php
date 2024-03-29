<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;


class Infraction extends Model
{   
    use HasFactory;

    protected $table = 'infractions';

    protected $fillable = ['reason', 'issuer_id', 'receiver_id'];

    public function receiver(): BelongsTo {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    public function issuer(): BelongsTo {
        return $this->belongsTo(User::class, 'issuer_id', 'id');
    }

}
