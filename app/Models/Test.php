<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable=['title','user_id','exam'];
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
}
