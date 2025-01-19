<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Seluruh Data Almarhum</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 20px auto;
        }

        .data-container {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 10px 20px;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #007bff;
        }

        .data-container h3 {
            grid-column: 1 / -1;
            font-size: 20px;
            color: #007bff;
            margin: 0 0 10px;
        }

        .data-item {
            font-size: 14px;
            color: #555;
        }

        .data-item strong {
            color: #333;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <h2>Laporan Seluruh Data Almarhum</h2>
    <div class="container">
        @foreach ($almarhum as $item)
        <div class="data-container">
            <h3>No: {{ $loop->iteration }}</h3>
            <div class="data-item"><strong>Nama Almarhum:</strong> {{ $item->namaalmarhum }}</div>
            <div class="data-item"><strong>NIK Almarhum:</strong> {{ $item->nik }}</div>
            <div class="data-item"><strong>Tempat, Tanggal Lahir:</strong> {{ $item->tempat_tanggal_lahir }}</div>
            <div class="data-item"><strong>Tempat, Tanggal Meninggal:</strong> {{ $item->tempat_tanggal_meninggal }}</div>
            <div class="data-item"><strong>Nama Pelapor:</strong> {{ $item->pelapor->namapelapor }}</div>
            <div class="data-item"><strong>Nama Keluarga:</strong> {{ $item->nama_keluarga }}</div>
        </div>
        @endforeach
    </div>
</body>
</html>
