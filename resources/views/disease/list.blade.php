<table class="table table-bordered">
    <thead>
        <tr>
            <th>NAMA PENYAKIT</th>
            <th>ICD-10</th>
            <th>Class</th>
            <th>Lama Perawatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($diseases as $disease)
            <tr>
                <td>{{ $disease->Nama_Penyakit }}</td>
                <td>{{ $disease->IcdX }}</td>
                <td>{{ $disease->Class }}</td>
                <td>{{ $disease->Lama_Rawat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>