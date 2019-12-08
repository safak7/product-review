<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 5.12.2019
 * Time: 23:00
 */

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'product';
}