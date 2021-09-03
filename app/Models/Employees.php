<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable=[
        'user_id','company_id','active','first_name','last_name','phone','email'
    ];
    public function company()
    {
        return $this->hasOne(Companies::class, 'id', 'company_id');
    }
}
