<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    use HasFactory;

    protected $fillable = ['decision_number', 'judgement_number', 'decision_date', 'issuing_authority'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function employees() {
        return $this->belongsToMany(Employee::class, 'decision_employees');
    }

}
