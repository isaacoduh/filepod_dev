<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'file_path'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    protected $dates = ['created_at', 'updated_at'];
}
