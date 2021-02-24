<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenaltyEmployee extends Model
{
    use HasFactory;
    protected $fillable = ['penalty', 'penalty_reason', 'decision_id', 'employee_id', 'penalty_id'];
}
