<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyCategories extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "note",
        "const_salary",
        "company_id",
        "status"
    ];


    public function status()
    {
        return $this->status == 0 ? __('site.not active') : __('site.active');
    }
}