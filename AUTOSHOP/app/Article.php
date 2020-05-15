<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

public static function search($filter)
{
$artikli= Article::where('marka', '=', $filter)->paginate(9);;
return $artikli;


}
public $timestamps=false;
    protected $table="artikal";
}
