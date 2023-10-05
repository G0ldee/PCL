<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'Phone',
        'Email'
    ];

    public $table = "dbo.ContactInfo";

    use HasFactory;
}
