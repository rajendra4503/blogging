<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /***********Post hsa on category************** */
    public function category(){

        return $this->belongsTo('App\Category');
        
   }
}
