<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 5.12.2019
 * Time: 23:00
 */

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ProductReviewStatus extends Model
{
    const WAITING = 0;
    const APPROVED = 1;
    const REJECTED = 2;

    protected $table = 'productreviewstatus';
    protected $fillable = [];
}