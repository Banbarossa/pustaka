<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu ID Perpustakaan</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        .card {
            width: 8.56cm;
            height: 5.398cm;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .logo {
            width: 50px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%)
        }

        .info {
            margin-top: 40px;
        }
        .text-center{
            text-align: center;
        }
        .text-center h3{
            margin: 10px;
        }
        
        .nama {
            font-size: 16px;
            font-weight: bold;
        }

        .nim, .tgl_lahir {
            font-size: 14px;
        }

        .qr-code {
            position: absolute;
            left: 10px;
            bottom: 10px;
        }


        .barcode {
            position: absolute;
            right: 10px;
            bottom: 10px;

        }

        p {
            margin: 0;
        }
        .page-break {
			page-break-after: always;
		}
		
    </style>
</head>
<body>
    @foreach ($data as $chunk)
        @foreach ($chunk as $model)
        <div class="card-holder">
            <div class="card" style="margin-bottom: 10px">
                <img class="logo" src="{{asset('assets/images/logo atas.png')}}" alt="Logo Perpustakaan">
                <div class="info">
                    <div class="text-center">
                        <h3>Kartu Perpustakaan</h3>
                    </div>
                    <p class="nama">{{strtoupper($model->name)}}</p>
                    <p class="nim">NISN: {{$model->nisn}}</p>
                    <p class="tgl_lahir">Tanggal Lahir: {{$model->dob}}</p>
                </div>
                <div class="qr-code">
                    <div>{!! DNS2D::getBarcodeHTML("$model->nisn", 'QRCODE',2,2,'maroon', true) !!}</div>
                </div>
                <div class="barcode">
                    <div class="">{!! DNS1D::getBarcodeHTML("$model->nisn", 'C128',1,33,'maroon') !!}</h3>
                </div>
            </div>
        </div>
            
        @endforeach
        <div class="page-break"></div>
    @endforeach
</body>
</html>
