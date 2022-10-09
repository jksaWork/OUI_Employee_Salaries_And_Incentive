<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_detiles extends Model
{
    use HasFactory;


    public function status()
    {
        return $this->active == 1 ? __('site.active') : __('site.not active');
    }

    public function categroy()
    {
        return $this->belongsTo(CompanyCategories::class, 'category_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}