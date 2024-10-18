@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #2c2c2c;
        color: #fff; 
    }

    .table-container {
        background-color: rgba(255, 255, 255, 0.1); 
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3); 
        margin: 50px auto;
        width: 80%; 
    }

    .table thead {
        background-color: #6a0dad;
        color: #fff;
    }

    .table tbody tr:hover {
        background-color: #474747; 
    }

    .table td, .table th {
        text-align: center; 
        vertical-align: middle;
    }

    .btn-custom {
        background-color: #6a0dad; 
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #4b0082; 
    }
</style>

<div class="table-container">
    <h2 class="text-center mb-4">Daftar Pengguna</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['nama'] }}</td>
                <td>{{ $user['npm'] }}</td>
                <td>{{ $user['nama_kelas'] }}</td>
                <td>
                    <img src="{{ asset('' . $user->foto)}}" alt="Foto user" width="100">
                </td>
                <td>
                    <a href="{{ route('user.show', $user['id']) }}" class="btn btn-primary btn-sm">View</a>

                    <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda Yakin ingin menghapus user ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
