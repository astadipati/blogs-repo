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
}
