<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user')->withPivot('account_type');;
    }

    public function companyAccountTypes()
    {
        return $this->belongsToMany(companyAccountType::class, 'company_user');
    }

}
