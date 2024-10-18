<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <style>
         body {
            background-image:url("../Assets/img/qsw.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        
        .box {
            background: white;
            border: 1px solid #000;
            padding: 20px;
            width: 300px;
            margin: 20px auto;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
            border-radius: 18px;
        }
        img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            font-weight: bold;
        }

       
    </style>
</head>
<body>
    <div class="box">
        <img src="{{ asset($user->foto)}}" alt="">
        <p> {{ $user->nama }}</p>
        <p> {{ $user->npm }}</p>
        <p> {{ $user->nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
    </div>
</body>
</html>
