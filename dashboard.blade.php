<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
}

.container {
    width: 80%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 28px;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    color: #fff;
    cursor: pointer;
}

.btn-primary {
    background-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-info {
    background-color: #17a2b8;
}

.btn-info:hover {
    background-color: #117a8b;
}

.btn-warning {
    background-color: #ffc107;
}

.btn-warning:hover {
    background-color: #d39e00;
}

.btn-danger {
    background-color: #dc3545;
}

.btn-danger:hover {
    background-color: #bd2130;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th,
.table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #f5f5f5;
}

.table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tbody tr:hover {
    background-color: #e9ecef;
}

#logoutBtn {
    margin-top: 20px;
}

</style>
<body>
    <div class="container">
        <h1>Data Buku</h1>
        <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($buku as $data)
                <tr>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->pengarang }}</td>
                    <td>{{ $data->penerbit }}</td>
                    <td>
                        <a href="{{ route('buku.show', $data->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('buku.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('buku.destroy', $data->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="#" id="logoutBtn" class="btn btn-danger">Logout</a>
    </div>
    <script>
        document.getElementById('logoutBtn').addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = '/login'; 
    });
    </script>
</body>
</html>
