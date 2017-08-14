<?php
/**
 * Created by PhpStorm.
 * User: skimeli
 * Date: 8/12/17
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public $fillable = ['title','description'];

}