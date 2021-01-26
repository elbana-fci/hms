<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    use HasFactory;

    protected $fillable = ['penalty', 'penalty_reason', 'decision_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function decision() {
        return $this->belongsTo(Decision::class);
    }
    
    public function employees() {
        return $this->belongsToMany(Employee::class, 'penalty_employees');
    }

}
