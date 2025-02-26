<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address', 'user_agent', 'url'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->visited_at = now(); // Присваиваем текущее время вручную
        });
    }

}
