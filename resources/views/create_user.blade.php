<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("../Assets/img/begron.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .form-box {
            background-color: rgba(255, 255, 255, 0.8); /* Transparansi pada background box */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .btn-custom {
            background-color: #000;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #6a0dad;
            color: #fff;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>


 <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 form-box">
        <form action="{{route('user.store')}}" method="POST">
        @csrf
        <h2 class="text-center mb-4">Masukkan Data</h2>
        
       
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
            @foreach($errors->get('nama') as $msg)
                <div class="error-message">{{ $msg }}</div>
            @endforeach
        </div>

       
        <div class="mb-3">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" class="form-control" id="npm" name="npm" placeholder="Masukkan NPM" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
            @foreach($errors->get('npm') as $msg)
                <div class="error-message">{{ $msg }}</div>
            @endforeach
        </div>

      
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select name="kelas_id" id="kelas" class="form-control">
                <option value="" selected disabled>-- Pilih Kelas --</option>
                @foreach($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select>
            @foreach($errors->get('kelas_id') as $msg)
                <div class="error-message">{{ $msg }}</div>
            @endforeach
        </div>

       
        <button type="submit" class="btn btn-custom w-100">Submit</button>
    </form>
    </div>
</div>  

 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>