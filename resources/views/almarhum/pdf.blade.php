<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akta Kematian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .content {
            margin: 20px;
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
        }
        .content table td, .content table th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .content table th {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Akta Kematian</h2>
        <p>Nomor Registrasi: {{ $data->id }}</p>
    </div>
    <div class="content">
        <table>
            <tr>
                <th>Nama Almarhum</th>
                <td>{{ $data->namaalmarhum}}</td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>{{ $data->tempat_tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Meninggal</th>
                <td>{{ $data->tempat_tanggal_meninggal }}</td>
            </tr>
            <tr>
                <th>Tempat Pemakaman</th>
                <td>{{ $data->nama_tempat_pemakaman }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>{{ $data->nik }}</td>
            </tr>
            <tr>
                <th>Nama Keluarga</th>
                <td>{{ $data->nama_keluarga }}</td>
            </tr>
            <tr>
                <th>No HP Keluarga</th>
                <td>{{ $data->nohp_keluarga }}</td>
            </tr>
        </table>
        <p style="margin-top: 30px; text-align: right;">Tertanda,</p><br>
        <p style="text-align: right;">_________________________</p>
    </div>
</body>
</html>
