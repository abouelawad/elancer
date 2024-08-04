<?php 

namespace App\Enums;

use Rexlabs\Enum\Enum;

class Project extends Enum
{

  const TYPES=['fixed'=>'fixed','hourly'=>'hourly'];
  const STATUSES = ['open'=>'open','in progress'=>'in progress','closed'=>'closed'];

  public static function types(){
    return
        self::TYPES ;
  }
  public static function statuses(){
      return
          self::STATUSES ;
  }
}