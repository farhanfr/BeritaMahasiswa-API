<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table='news';
    protected $primaryKey='news_id';
    protected $fillable=['news_title','category_news_id','news_content','news_img','date_published','news_tipe'];
    public $timestamps=FALSE;
}
