<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsModel;

class NewsController extends Controller
{
    private $statusSuccess=200;
    private $statusErr=500;

    public function add_news(Request $request)
    {
		$addNews=NewsModel::create([
			'news_title'=>$request['news_title'],
			'category_news_id'=>$request['category_news_id'],
			'news_content'=>$request['news_content'],
			'news_img'=>$request['news_img'],
			'date_published'=>date('Y-m-d'),
			'news_tipe'=>$request['news_tipe']
		]);

		if ($addNews) {
			return response()->json([
				'status'=>$this->statusSuccess,
				'data'=>[$addNews],
				'msg'=>'add news success'
			]);
		}
		else{
			return response()->json([
				'status'=>$this->statusErr,
				'data'=>[],
				'msg'=>'add news failed'
			]);	
		}
    }

    public function get_top_news()
    {
    	$getTopNews=NewsModel::where('news_tipe','top')->get();
    	if ($getTopNews) {
			return response()->json([
				'status'=>$this->statusSuccess,
				'data'=>$getTopNews,
				'msg'=>'get news success'
			]);
		}
		else{
			return response()->json([
				'status'=>$this->statusErr,
				'data'=>[],
				'msg'=>'get news failed'
			]);	
		}
    }

    public function get_new_news()
    {
    	$getNewNews=NewsModel::where('news_tipe','new')->get();
    	if ($getNewNews) {
			return response()->json([
				'status'=>$this->statusSuccess,
				'data'=>$getNewNews,
				'msg'=>'get news success'
			]);
		}
		else{
			return response()->json([
				'status'=>$this->statusErr,
				'data'=>[],
				'msg'=>'get news failed'
			]);	
		}	
    }

    public function get_regular_news()
    {
    	$getRegularNews=NewsModel::where('news_tipe','regular')->get();
    	if ($getRegularNews) {
			return response()->json([
				'status'=>$this->statusSuccess,
				'data'=>$getRegularNews,
				'msg'=>'get news success'
			]);
		}
		else{
			return response()->json([
				'status'=>$this->statusErr,
				'data'=>[],
				'msg'=>'get news failed'
			]);	
		}	
    }
}
