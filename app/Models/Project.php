<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable=['title','user_id','category_id','description','status','type','budget','attachments'];
   

    /** NOTE
     * hard coding for type and status columns (Enum dataType) 
     * 
     * Reference Safadi elancer e15 @9:15
     */
    public $casts=['attachments'=>'json'];
    
    const TYPES=['fixed'=>'fixed','hourly'=>'hourly'];
    const STATUSES = ['open'=>'open','in progress'=>'in progress','closed'=>'closed'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, //related Model  (safady elancer e15.2)
                                    'project_tag', // table pivot name
                                    'project_id',  // foreign key for current model in pivot table
                                    'tag_id',      // foreign key for related model in pivot table
                                    'id',           // primary key for current model
                                    'id');           // primary key for related model 
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
