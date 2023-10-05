<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public $table = "dbo.Loans";
    
    public $timestamps = false;

    protected $fillable = [
    'MemberId',
    'DocumentId',
    'RequestId',
    'StartDate',
    'EndDate'
    ];

    use HasFactory;
}
