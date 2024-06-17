<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departement;
use App\Models\Position;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'email', 'phone', 'address', 'birthdate', 'departement_id', 'position_id'];

    public function department()
    {
        return $this->belongsTo(Departement::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
