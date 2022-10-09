<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'permission'
    ];
    public function getPermissionsAttribute($key)
    {
        return json_decode($key);
    }
}