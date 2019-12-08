<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 5.12.2019
 * Time: 23:00
 */

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    public $timestamps = false;
    protected $table = 'productreview';
    protected $primaryKey = 'ProductReviewID';
    protected $fillable = [];
}