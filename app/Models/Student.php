<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // ✅ Mass assignment ke liye
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'dob',
        'profile_image',
        'document_file'
    ];
}