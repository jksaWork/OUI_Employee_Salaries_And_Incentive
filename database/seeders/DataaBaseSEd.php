<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyCategories;
use App\Models\Employee;
use App\Models\Jobs;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;

class DataaBaseSEd extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => ' محمد التجاني ',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234567890'),
            'role_id' => 1,
        ]);

        Roles::create([
            'name' => 'super admin',
            'permissions' => '[
            "users",
            "create_user",
            "delete_users",
            "employee",
            "create_employee",
            "delete_employee",
            "edit_employee",
            "salary",
            "pay_salary",
            "roles",
            "0",
            "1",
            "company",
            "create_company",
            "delete company",
            "categroy",
            "create_categories",
            "delete_categoreis",
            "jobs",
            "create_jobs",
            "delete_jobs"]'
        ]);

        Jobs::create([
            'name' => 'عامل',
            'note' => 'مدير نظام ',
            'salary' => 50000,
        ]);
        Jobs::create([
            'name' => 'مراقب ',
            'note' => ' شس  ',
            'salary' => 60000,
        ]);
        Jobs::create([
            'name' => 'مشرف ',
            'note' => ' شس  ',
            'salary' => 70000,
        ]);

        Company::create([
            'name' => 'بنك فيصل الاسلامي السوداني',
            'descrptions' => ' بنك فيصل الاسلامي السوداني  ',
            'status' => 1,
        ]);
        Company::create([
            'name' => 'شركه الكهرباء السودانيه',
            'descrptions' => 'بنك فيصل الاسلامي السوداني ',
            'status' => 1,
        ]);

        CompanyCategories::create([
            'name' => 'بنك فيصل الاسلامي السوداني فرع المهندسين',
            'company_id' => 1,
            'note' => 'jksa',
            'const_salary' => 20000,
            'status' => 1,
        ]);
        CompanyCategories::create([
            'name' => ' بنك فيصل الاسلامي السوداني فرع الفتيحاب ',
            'company_id' => 1,
            'note' => 'jksa',
            'const_salary' => 10000,
            'status' => 1,
        ]);
        CompanyCategories::create([
            'name' => ' مكتب الكهرباء الحلفايه  ',
            'company_id' => 2,
            'note' => 'jksa',
            'const_salary' => 15000,
            'status' => 1,
        ]);
        CompanyCategories::create([
            'name' => 'مكتب الكهرباء امدرمان  ',
            'company_id' => 2,
            'note' => 'jksa',
            'const_salary' => 25000,
            'status' => 1,
        ]);
        Employee::create([
            "name" => " احمد محمد الحسن",
            "email" => "inlineblock@in.com",
            "phone" => "0915477450",
            "age" => "21",
            "job_id" => "2",
            "company_id" => "1",
            "category_id" => "1",
            "active" => "1",
            "const_salary" => "15000.00",
            "salary" => "70000.00",
            "all_salary" => "85000",
            'add_by' => 1,
            "note" => "اول موظف",
        ]);
    }
}
