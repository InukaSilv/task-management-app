<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'assigned_to', 'completed'];

    // Task belongs to a user (owner)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Task assigned to a user
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
