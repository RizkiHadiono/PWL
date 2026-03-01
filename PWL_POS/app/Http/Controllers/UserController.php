<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        // Tambah Data
        // $data = ['level_id' => 4, 'username' => 'customer-1', 'nama' => 'Pelanggan', 'password' => Hash::make('12345')];
        // UserModel::insert($data);

        // Update Data
        $data = ['nama' => 'Pelanggan Pertama'];
        UserModel::where('username', 'customer-1')->update($data);

        // Ambil Data
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}

