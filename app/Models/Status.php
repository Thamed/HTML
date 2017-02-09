<?php

namespace Gallery\Models;
use Illuminate\Database\Eloquent\Model;

class Status extends Model{
    protected $table ='statuses';

    protected $fillable= [
        'body', 'image'
    ];

    public function user(){
        return $this->belongsTo('Gallery\Models\User', 'user_id');
    }

    public function scopeNotReply($query){
        return $query->whereNull('parent_id');
    }

    public function replies(){
        return $this->hasMany('Gallery\Models\Status', 'parent_id');
    }

    public function images(){
        return $this->hasMany('Gallery\Models\Status', 'image');
    }

    public function likes(){
        return $this->morphMany('Gallery\Models\Like', 'likeable');
    }
}