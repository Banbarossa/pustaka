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
            <h4>Daftar Kunjungan perpustakaan</h4>
            <p>Periode : {{\Carbon\Carbon::parse($startDate)->format('d M Y')}} s/d {{\Carbon\Carbon::parse($startDate)->format('d M Y')}}</p>
            
        </div>
        <section class="content">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Nama Visitor</th>
                        <th>Tujuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kunjungan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->waktu }}</td>
                        <td>{{ $item->anggota ? $item->anggota->name : 'Anggota Non Aktif' }}</td>
                        <td>{{ $item->tujuan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
