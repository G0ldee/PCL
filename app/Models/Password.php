<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
  public $timestamps = false;

  protected $fillable = [
    'PassHash'
  ];
  public $table = "dbo.Passwords";
  public $column = "dbo.PassHash";

  //  use HasFactory;
}
