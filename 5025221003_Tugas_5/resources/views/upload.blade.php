<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <style>
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
    <h1>Upload Image</h1>
    
    <!-- Form Upload -->
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">Upload</button>
    </form>

    <!-- Menampilkan Gambar yang Diunggah -->
    @if(session('path'))
        <h2>Uploaded Image:</h2>
        <img src="{{ Storage::url(session('path')) }}" alt="Uploaded Image" style="max-width: 300px;">
    @endif

    <!-- Menampilkan Pesan Error Jika Ada -->
    @if($errors->any())
        <h4>Errors:</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Menampilkan Tabel Daftar File yang Diunggah -->
    <h2>Uploaded Files</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Filename</th>
                <th>Filepath</th>
                <th>Filetype</th>
                <th>Filesize (KB)</th>
                <th>Image</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
                <tr>
                    <td>{{ $file->id }}</td>
                    <td>{{ $file->filename }}</td>
                    <td>{{ $file->filepath }}</td>
                    <td>{{ $file->filetype }}</td>
                    <td>{{ number_format($file->filesize / 1024, 2) }}</td> <!-- Konversi byte ke KB -->
                    <td>
                        <img src="{{ Storage::url($file->filepath) }}" alt="{{ $file->filename }}" style="max-width: 100px;">
                    </td>
                    <td>{{ $file->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
