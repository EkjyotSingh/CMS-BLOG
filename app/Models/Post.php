<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'title','content','description','published_at','image','category_id','slug','user_id'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSearched($query){
        if(request()->search){
            $query->where('title','LIKE','%'.request()->search.'%');
        }
        return $query;
    }
}

