<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    private $statusSuccess=200;
	private $statusErr=500;

    public function add_mahasiswa(Request $request)
    {
    	$addMahasiswa=MahasiswaModel::create([
    		'mahasiswa_name'=>$request->mahasiswa_name,
    		'mahasiswa_nim'=>$request->mahasiswa_nim,
    		'mahasiswa_class'=>$request->mahasiswa_class,
    		'mahasiswa_born'=>$request->mahasiswa_born,
            'mahasiswa_password'=>Hash::make($request->mahasiswa_password)
    	]);

    	if ($addMahasiswa) {
    		return response()->json([
    			'status'=>$this->statusSuccess,
    			'data'=>[$addMahasiswa],
    			'msg'=>'Mahasiswa created successfully'
    		]);
    	}
    	else{
    		return response()->json([
    			'status'=>$this->statusErr,
    			'data'=>[$this->statusErr],
    			'msg'=>'Mahasiswa created fail'
    		]);	
    	}
    }
}
