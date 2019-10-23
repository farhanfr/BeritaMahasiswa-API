<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MahasiswaModel;

class BiodataController extends Controller
{

	private $statusSuccess=200;
	private $statusErr=500;
    private $statusNotFound=404;

    public function edit_bio(Request $request)
    {
    	$editBio=MahasiswaModel::findOrFail($request->mahasiswa_id);
    	$editBio->update($request->all());
    	if ($editBio) {
    		return response()->json([
    			'status'=>$this->statusSuccess,
    			'data'=>[$editBio],
    			'msg'=>'update biodata mahasiswa success'
    		]);
    	}
    	else{
    		return response()->json([
    			'status'=>$this->statusErr,
    			'data'=>[],
    			'msg'=>'update biodata mahasiswa failed'
    		]);
    	}
    }
}
