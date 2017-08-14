<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'id', 'email','content','link_id'
    ];
    public function link()
    {
        return $this->belongsTo('App\Link','link_id');
    }
}
