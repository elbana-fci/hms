<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    use HasFactory;

    protected $fillable = ['decision_number', 'judgement_number', 'decision_date', 'issuing_authority', 'decision_content'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function penalties() {
        return $this->belongsToMany(Penalty::class, 'decision_penalties');
    }

}
