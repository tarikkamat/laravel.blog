<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['name','content','article_id','status','ip_adress'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
