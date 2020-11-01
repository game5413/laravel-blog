<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'name',
        'deleted_at'
    ];

    protected $dates = [
        'created_at',
        'deleted_at'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function posts() {
        return $this->hasMany('App\Post', 'category_id', 'id');
    }
}
