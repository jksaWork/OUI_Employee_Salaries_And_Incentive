<?php

namespace App\Models;

use Illuminate\Contracts\Queue\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    public function status()
    {
        return $this->active == 1 ? __('site.active') : __('site.not active');
    }



    ###################rlation with other elquent
    public function employeejob()
    {
        return $this->belongsTo(Jobs::class, 'job_id', 'id');
    }

    public function categroy()
    {
        return $this->belongsTo(CompanyCategories::class, 'category_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function Detilas()
    {
        return $this->hasMany(Employee_detiles::class, 'employee_id');
    }
    public function Attachment()
    {
        return $this->hasMany(EmpAtatchment::class, 'employee_id');
    }
}
