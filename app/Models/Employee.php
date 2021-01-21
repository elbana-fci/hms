<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'degree', 'title'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function decisions() {
        return $this->belongsToMany(Decision::class, 'decision_employees');
    }

    public function penalties() {
        return $this->belongsToMany(Penalty::class, 'penalty_employees');
    }
}
