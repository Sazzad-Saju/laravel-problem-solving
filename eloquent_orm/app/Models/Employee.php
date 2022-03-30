<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'department_id',
        'blood_group_id',
    ];
    protected $hidden = [
        'password',
    ];
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function blood_group(){
        return $this->belongsTo(BloodGroup::class);
    }
}
