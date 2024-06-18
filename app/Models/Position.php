<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Employee;

class Position extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    public $timestamps = false;

    protected $fillable = ['title', 'level', 'description'];

    public function employee()
    {
        return $this->hasMany(Employee::class, 'position_id', 'id');
    }
}
