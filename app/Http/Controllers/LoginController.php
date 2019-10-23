<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MahasiswaModel;
use Hash;

class LoginController extends Controller
{
	private $statusSuccess=200;
	private $statusUnauthorize=401;

	public function login_mahasiswa(Request $request)
	{
		$nimInput=$request['mahasiswa_nim'];
		$passwordInput=$request['mahasiswa_password'];
		$token=substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 1);

		$data=MahasiswaModel::where('mahasiswa_nim',$nimInput)->get();
		if (count($data) > 0) {
			if (Hash::check($passwordInput, $data[0]->mahasiswa_password)) {
				$getToken=MahasiswaModel::findOrFail($data[0]->mahasiswa_id);
				$getToken->mahasiswa_token=$token;
				if ($getToken->update()) {
					return response()->json([
						'status'=>$this->statusSuccess,
						'data'=>$data,
						'msg'=>'Login Success'
					]);
				}
				else {
					return response()->json([
						'status'=>$this->statusUnauthorize,
						'data'=>[],
						'msg'=>'get tokne failed'
					]);
				}
				
			}
			else {
					return response()->json([
						'status'=>$this->statusUnauthorize,
						'data'=>[],
						'msg'=>'Nim atau password salah1'
					]);
				}
		}
		else {
			return response()->json([
				'status'=>$this->statusUnauthorize,
				'data'=>[],
				'msg'=>'Nim atau password salah2'
			]);
		}
	}
}
