<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;
    // protected $primaryKey = 'user_id';

    protected $guarded=[];

   public function  user()
   {
     $this->belongsTo(User::class);
   }
}
