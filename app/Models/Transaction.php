<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  public $timestamps = false;
  public $table = "dbo.Transactions";

    
    protected $fillable = [
        'MemberId',
        'DocumentId',
        'LoanId',
        'RequestId',
        'DocReturn',
        'TDate',
        'TDescription'
      ];
    
    use HasFactory;
}
