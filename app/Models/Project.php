<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded=[];

    /** NOTE
     * hard coding for type and status columns (Enum dataType) 
     * 
     * Reference Safadi elancer e15 @9:15
     */

    const TYPES=['fixed'=>'fixed','hourly'=>'hourly'];
    const STATUSES = ['open'=>'open','in progress'=>'in progress','closed'=>'closed'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public static function types(){
        return
            self::TYPES ;
    }
    public static function statuses(){
        return
            self::STATUSES ;
    }


}
