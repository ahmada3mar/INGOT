<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Category ;
use App\User ;

class Transaction extends Model
{    
    protected $table = "transactions";
    public $primaryKey = 'id';
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
