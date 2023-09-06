`<html>
<head>
	<title>Laporan Pengaduan</title>
</head>
<body>
	<style type="text/css">
table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 9pt;
}

.table td, .table th {
  border: 1px solid #ddd;
  padding: 8px;
}

.table tr:nth-child(even){background-color: #f2f2f2;}

.table tr:hover {background-color: #ddd;}

.table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
}
	</style>
	<center>
		<h2>Laporan Pengaduan Masyarakat</h2>
	</center>
 
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Judul</th>
				<th>Kategori</th>
				<th>Status</th>
				<th>Nama Petugas</th>
				<th>Jabatan</th>
			</tr>
		</thead>
		<tbody>
			@php
			($i = 0)
			@endphp
			@foreach($tanggapan as $p)
			@if($p->status == "proses")
			<tr>
				<td>{{++$i}}</td>
				<td class="" style="font-weight: bold;">{{$p->nik}}</td>
				<td>{{$p->nama}}</td>
				<td>{{$p->judul}}</td>
				<td>{{$p->kategori}}</td>
				<td>{{$p->status}}</td>
				<td>{{$p->name}}</td>
				<td>{{$p->level}}</td>

			</tr>
			@elseif($p->status == "selesai")
			<tr>
				<td>{{++$i}}</td>
				<td style="font-weight: bold;">{{$p->nik}}</td>
				<td>{{$p->nama}}</td>
				<td>{{$p->judul}}</td>
				<td>{{$p->kategori}}</td>
				<td>{{$p->status}}</td>
				<td>{{$p->name}}</td>
				<td>{{$p->level}}</td>

			</tr>
			@endif
			@endforeach
		</tbody>
	</table>
 
</body>
</html>