<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Unduh Pdf</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header img {
            width: 100px;
        }

        .title {
            font-size: 18px;
            margin-top: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div>
        <div class="header">
            <img src="{{ asset('assets/images/logo atas.png') }}" alt="">
        </div>
        <div class="title">
            <h4>Daftar Anggota perpustakaan</h4>
            
        </div>
        <section class="content">
            <div style="margin-bottom: 5px">
                <div>
                    <h5>Kategori : {{$role}}</h5>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Anggota</th>
                            <th>Nama</th>
                            <th>Tempat, tgl Lahir</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->pob ? $item->pob.',':''  }} {{$item->dob ? \Carbon\Carbon::parse($item->dob)->format('d m Y') : ''}}</td>
                            <td>{{ $item->role }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </section>
    </div>
</body>
</html>
