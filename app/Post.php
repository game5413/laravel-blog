<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'body',
        'status'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    public static function generateSlug($slug = "", $default = true) {
        $uri = "";
        if ($default) {
            $date = Carbon::now();
            $uri .= $date->format('Y').'-'.$date->format('m');
        }
        if ($slug != "" && !$default) {
            $uri .= Str::slug($slug, '-');
        } else {
            $uri .= '-'.Str::slug($slug, '-');
        }
        return $uri;
    }

    public function draft($is_draft = false) {
        $is_draft = !!$is_draft;
        return $this->update([
            'status' => $is_draft
        ]);
    }
}
