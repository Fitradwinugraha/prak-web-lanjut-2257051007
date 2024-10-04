<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Display</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #2B6B7D; 
            margin: 0;
        }
        .profile-container {
            text-align: center;
        }
        .profile-container img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 2px solid #000; 
        }
        .info {
            font-size: 18px;
            color: black; 
            background-color: #d3d3d3; 
            padding: 10px;
            border-radius: 5px;
            width: 200px;
            margin: 15px auto; 
        }

    </style>
</head>
<body>

<div class="profile-container">
<img src="{{ asset('img/foto.jpeg') }}" alt="Foto Profil">
    <div class="info">{{$nama}}</div>
    <div class="info">{{$kelas}}</div>
    <div class="info">{{$npm}}</div>
</div>

</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
        <img src="../Assets/img/nyengir.jpeg" alt="">
        <p> {{ $nama }}</p>
        <p> {{ $npm }}</p>
        <p> {{ $kelas }}</p>
    </div>
</body>
</html>

