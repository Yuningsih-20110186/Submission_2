<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getDataUser(Request $request) {
        $nama = $request->get('nama');
        $password = $request->get('password');


        $arrNama = [
            'nama' => $nama,
            'password' => $password
        ];

        return json_encode($arrNama);
    }

    public function createDataUser(Request $request) {
        $post = $request->post();
        $arr = [];
        $arr['username'] = $request->post('username');
        $arr['password'] = $request->post('password');
        $arr['no_telp'] = $request->post('no_telp');
        $arr['alamat'] = $request->post('alamat');

        $isValid = self::cekUser($arr['username']);
        if ($isValid){
            $res['status'] = true;
            $res['message'] = 'Username Valid!';
            $code = 200;
        } else {
            $res['status'] = false;
            $res['message'] = 'Username Tidak Valid!';
            $code = 401;
        }

        //response json
        return response()->json($res, $code);
    }

    private static function cekUser($username) {
        if ($username == 'yuningsih') {
            return true;
        } else {
            return false;
        }
    }

    public function updateDataUser(Request $request) {
        $post = $request->post();
        $arr = [];
        $arr['username'] = $request->post('username');
        $arr['password'] = $request->post('password');
        $arr['no_telp'] = $request->post('no_telp');
        $arr['alamat'] = $request->post('alamat');

        //Buat response seperti ketika insert, silahkan improve sendiri

        return response()->json($arr, 200);
    }

    public function deleteDataUser(Request $request) {
        $arr = [];
        $arr['username'] = $request->get('username');

        $isValid = self::cekUser($arr['username']);
        if ($isValid){
            $res['status'] = true;
            $res['message'] = 'Data berhasil dihapus!';
            $code = 200;
        } else {
            $res['status'] = false;
            $res['message'] = 'Data tidak ditemukan / username tidak valid!';
            $code = 401;
        }

        return response()->json($res, $code);
    }
}
