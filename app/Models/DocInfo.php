<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocInfo extends Model
{
    protected $fillable = [
        'DocInfo',
        'Category',
        'Type',
        'Genre',
    ];

    public $table = "dbo.DocInfo";

    //use HasFactory;
}
