<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function projectStatusTypes()
    {
        return $this->belongsToMany(ProjectStatusType::class, 'company_user');
    }    
}
