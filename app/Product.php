<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'price',
    	'featured',
    	'recommended',
        'category_id'
    ];

    public function category()
    {
    	return $this->belongsTo('CodeCommerce\Category');
    }
}