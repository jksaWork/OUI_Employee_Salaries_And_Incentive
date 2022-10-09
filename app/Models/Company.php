<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable  =
    [
        'name',
        'descrptions',
        'status',
    ];

    public function status()
    {
        return $this->status == 0 ? __('site.not active') : __('site.active');
    }


    ###################### Relation with other model ############

    public function categories()
    {
        return $this->hasMany(CompanyCategories::class, 'company_id', 'id');
    }
}