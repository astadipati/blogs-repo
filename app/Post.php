<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Post extends Model
{
    protected $dates = ['published_at'];
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

    public function getDateAttribute($value)
    {
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
        // return $this->created_at->diffForHumans();
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at','desc');
    }

    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }

}
