<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mskdata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Edit Mskdata</h1>
    <form action="{{ route('mskdata.update', $data->id_mskdata) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="kegiatan">Kegiatan:</label>
        <input type="text" name="kegiatan" value="{{ $data->kegiatan }}" required>

        <label for="tanggal_kegiatan">Tanggal Kegiatan:</label>
        <input type="date" name="tanggal_kegiatan" value="{{ $data->tanggal_kegiatan }}" required>

        <label for="situs_kegiatan">Situs Kegiatan:</label>
        <input type="text" name="situs_kegiatan" value="{{ $data->situs_kegiatan }}" required>

        <label for="tempat_kegiatan">Tempat Kegiatan:</label>
        <input type="text" name="tempat_kegiatan" value="{{ $data->tempat_kegiatan }}" required>

        <label for="penyelenggara">Penyelenggara:</label>
        <input type="text" name="penyelenggara" value="{{ $data->penyelenggara }}" required>

        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan" required>{{ $data->keterangan }}</textarea>

        <label for="jam_mulai">Jam Mulai:</label>
        <input type="text" name="jam_mulai" value="{{ $data->jam_mulai }}" required>

        <label for="jam_selesai">Jam Selesai:</label>
        <input type="text" name="jam_selesai" value="{{ $data->jam_selesai }}" required>

        <label for="dana_keluar">Dana Keluar:</label>
        <input type="number" name="dana_keluar" value="{{ $data->dana_keluar }}" required>

        <label for="proposal">Proposal:</label>
        <input type="file" name="proposal">

        <button type="submit">Update</button>
    </form>
</body>
</html>
