<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public $table = "dbo.Requests";
    public $timestamps = false;

    protected $fillable = [
        'MemberId',
        'DocumentId',
        'RequestDate',
        'StartDate',
        'EndDate',
        'Accepted'
      ];
    use HasFactory;
}
