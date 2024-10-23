<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;

class UserController extends Controller {
    public $userModel;
    public $kelasModel;
    
    public function __construct() {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index() {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function profile($nama = "", $kelas = "", $npm = "") {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];

        return view('profile', $data);
    }

    public function create() {
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(UserRequest $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'ipk' => 'nullable|numeric|min:0|max:4.00', // Validasi IPK
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = $foto->hashName();
            $fotoPath = $foto->move(('upload/img'), $fotoName);

            // Ensure the path uses forward slashes
            $fotoPath = str_replace('\\', '/', $fotoPath);
        } else {
            $fotoPath = null;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),
            'ipk' => $request->input('ipk'), // Simpan nilai IPK
            'foto' => $fotoPath,
        ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id) {
        $user = $this->userModel->find($id);

        $data = [
            'nama' => $user->nama,
            'ipk' => $user->ipk, // Tampilkan hanya nama dan IPK
        ];

        return view('profile', $data);
    }

    public function update(UserRequest $request, $id) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'ipk' => 'nullable|numeric|min:0|max:4.00', // Validasi IPK
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = $this->userModel->find($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = $foto->hashName();
            $fotoPath = $foto->move(('upload/img'), $fotoName);
            $fotoPath = str_replace('\\', '/', $fotoPath);
        } else {
            $fotoPath = $user->foto;
        }

        $user->update([
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),
            'ipk' => $request->input('ipk'), // Update nilai IPK
            'foto' => $fotoPath,
        ]);

        return redirect()->to('/user')->with('success', 'User berhasil diupdate');
    }

    public function destroy($id) {
        $user = $this->userModel->find($id);

        if ($user->foto && file_exists(public_path($user->foto))) {
            unlink(public_path($user->foto)); // Hapus foto dari server
        }

        $user->delete();

        return redirect()->to('/user')->with('success', 'User berhasil dihapus');
    }
}
