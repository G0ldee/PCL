<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  public $timestamps = false;

  protected $fillable = [
    'FName',
    'LName',
    'Address',
    'ContactInfo',
  ];

    public $table = "dbo.Members";
    use HasFactory;
}
