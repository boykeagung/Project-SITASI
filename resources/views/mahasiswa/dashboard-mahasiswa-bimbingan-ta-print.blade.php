<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Bimbingan Tugas Akhir</title>
</head>
<body>
    <table class="table table-bordered" id="table1">
        <thead>
            <tr>
                <th>ID Bimbingan TA</th>
                <th>ID TA</th>
                <th>Tanggal Bimbingan</th>
                <th>Kegiatan Bimbingan</th>
                <th>Status</th>
                {{-- <th>Paraf Pembimbing 2</th> --}}
                <th>Update At</th>
                {{-- <th>Action</th> --}}
                {{-- <th>delete</th> --}}
            </tr>
        </thead>

        <tbody>
            @foreach ($bimbingan_ta as $bta)
            <tr>
                <th>{{$bta->id_bta}}</th>
                <th>{{$bta->id_ta}}</th>
                <th>{{$bta->tanggal_bimbingan}}</th>
                <th>{{$bta->kegiatan}}</th>
                <th>{{$bta->status}}</th>
                {{-- <th>{{$bta->status_p2}}</th> --}}
                <th>{{$bta->updated_at}}</th>
                {{-- <th>{{link_to('dashboard-mahasiswa-edit-bimbingan-ta/'.$bta->id,'Edit',['class'=>'btn btn-warning'])}} --}}
                </th>
            </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>