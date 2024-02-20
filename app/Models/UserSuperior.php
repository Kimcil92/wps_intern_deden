<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserSuperior extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'id',
        'user_id',
        'superior_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function superior()
    {
        return $this->belongsTo(UserSuperior::class, 'user_superior_id', 'superior_id');
    }
}
