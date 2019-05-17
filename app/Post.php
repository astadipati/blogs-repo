<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //accessor diawal get diakhiri atribut
    public function getImageUrlAttribute($value)
    {
        $imgUrl= "";
        if( ! is_null($this->image))
        {
            $imagePath = public_path()."/img/".$this->image;
            if(file_exists($imagePath))$imgUrl = asset("img/".$this->image);
        }
        return $imgUrl;
    }

    // karena post milik dari 1 user
    public function author()
    {
        // karena masih 1 namespace tidak perlu App\User
        return $this->belongsTo(User::class);
    }

    public function getDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function scopeLatestFirst()
    {
        return $this->orderBy('created_at','desc');
    }

}
