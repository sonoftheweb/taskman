<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date_completed',
        'date_to_be_completed',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
