<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        thead {
            background-color: #eee;
            display: table-header-group;
        }
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
    </style>
</head>
<body>
    <h3>Data Siswa</h3>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Siswa</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>Tanggal Lahir</th>
                <th>Kelas</th>
                <th>Tahun Ajaran</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($siswa as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->nama_siswa }}</td>
                    <td>{{ $row->nisn }}</td>
                    <td>{{ $row->nis }}</td>
                    <td>{{ $row->tanggal_lahir }}</td>
                    <td>{{ $row->kelas->nama_kelas ?? '-' }}</td>
                    <td>{{ $row->tahunAjaran->nama_tahun ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
