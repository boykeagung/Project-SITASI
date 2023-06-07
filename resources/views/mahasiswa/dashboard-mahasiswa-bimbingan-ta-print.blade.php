<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Bimbingan Tugas Akhir</title>
    <style>
        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        }
    
        table, th, td {
            border: 1px solid ;
            border-collapse: collapse;
        }
    
        .No{
            width: 7%;
            padding: 10px;
        }
        
        .p1{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            /* font-size: 20px; */

        }
        .sub-title{
            font-family: Calibri;
            font-size: 20px;
        }
        .table-title{
            font-family: Gothic, sans-serif;
            font-size: 14px;
        }
        .p4{
            font-family: TNR;
            font-size: 15px;
        }


        body{
            font-family: "source_sans_proregular", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif, Century 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;            
        }

        p.solid {
            border: 1px solid black;
            padding-left: 0.1in;
            border-style: solid;}
        
            
        table, th, td {
        /* padding-left: 0.1in; */
        border: 1px solid black;
        border-collapse: collapse;
        }
        .td-border{
            border-left: 1px solid white;
            border-right: 1px solid white;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
        }

        .td-left{
            border-left: 1px solid white;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
        }
        .td-right{
            border-right: 1px solid white;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
        }
        
        td.padding{
            padding-left: 0.1in;
            /* padding-top: 0.1in; */
        }

        .tab-I {
            display: inline-block;
            margin-left: 32px;
        }
        .tab-II {
            display: inline-block;
            margin-left: 27px;
        }
        .tab-III {
            display: inline-block;
            margin-left: 110px;
        }
        .tab-alamat {
            display: inline-block;
            margin-left: 119px;
        }
        .tab-bidang {
            display: inline-block;
            margin-left: 48px;
        }
        .tab-date {
            display: inline-block;
            margin-left: 265px;
        }
        .tab-pmhn {
            display: inline-block;
            margin-left: 318px;
        }
        .tab-mhs {
            display: inline-block;
            margin-left: 315px;
        }
        .tab-nrp {
            display: inline-block;
            margin-left: 35px;
        }
        .tab-input {
            display: inline-block;
            margin-left: 80px;
        }

        #fixedheight {
        table-layout: fixed;
        }
    
        #fixedheight td {
            width: 25%;
        }
        
        #fixedheight td div {
            height: 20px;
            overflow: hidden;
        }

        td.shrink {
            white-space: nowrap;
            width: 9.75px;
        }

        /* Create two equal columns that floats next to each other */
        .column-alt {
            display: inline-block;
        float: left;
        width: 50%;
        }

        /* Clear floats after the columns */
        .row:after {
        content: "";
        display: table;
        clear: both;
        }
    
        </style>
</head>
<body>
    <div class=""  >
        <p style="text-align:center; margin: 0" > <b> YAYASAN PENDIDIKAN DAYANG SUMBI<br></p>
            <h2 style=" text-align:center; margin : 0; ">
                INSTITUT TEKNOLOGI NASIONAL <br>
        </h2>
        <p style="text-align:center; margin : 0; padding-top:0" ><b> FAKULTAS TEKNOLOGI INDUSTRI<br></p>

        <p style=" text-align:center; margin: 0 "> <b>PROGRAM STUDI SISTEM INFORMASI</b></p>

        <p style=" text-align:center; font-weight: normal; font-size:6.7 ">
            Jl. PKH. Hasan Mustafa No. 23 Bandung 40124 Indonesia, 
            Telepon +62-22-7272215 ext 181, 
            Fax: +62-22-7202892 <br>
            Website: http://www.itenas.ac.id, email: miai@itenas.ac.id
        </p>
        
        <hr style="margin-left: 10px; margin-right: 10px">

        <h4 style=" margin-top:2; text-align:center; font-weight: normal; font-size: 85%; text-decoration: underline;  ">
            ABSENSI BIMBINGAN PELAKSANAAN TUGAS AKHIR (TA) *
        </h4>

        <div>
            <table style="width:100% ">
                <tr>
                    <td>
                        <table  style="width:100% border: 1px solid white; ">
                            <tr>
                                <td class="padding p4 shrink td-border">Nama:</td>
                            </tr>
                            <tr>
                                <td class="padding p4 shrink td-border">NRP:</td>
                            </tr>
                            <tr>
                                <td class="padding p4 shrink td-border">Judul Tugas Akhir:</td>
                            </tr>
                            <tr>
                                <td class="padding p4 shrink td-border">Nama Dosen Pembimbing:</td>
                            </tr>
                            <tr>
                                <td class="padding p4 shrink td-border">Ko.Pembimbing:</td>
                            </tr>
                        </table>  
                    </td>
                    <td style=" border-left: 1px solid; border-top: 1px solid;border-bottom: 1px solid;">
                    </td>
                </tr>
            </table>
        </div>

        {{-- <div style="margin:5px" >
        
            <table style="width:100% " >
                <tr>
                  <th class="No">No.</th>
                  <th style="width:70%">Jenis Penilaian</th>
                  <th style="width: 35%">Nilai*</th>
                </tr>
                <tr>
                  <td class="No" style="text-align: center;">1.</td>
                  <td>KEPRIBADIAN</td>
                  <td style="text-align: center;">80</td>
                </tr>
                <tr>
                  <td class="No" style="text-align: center;">2.</td>
                  <td> PENGUASAAN MATERI</td>
                  <td></td>
                </tr>
                <tr>
                    <td class="No" style="text-align: center;">3.</td>
                    <td>KETERAMPILAN</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="No" style="text-align: center;">4.</td>
                    <td>KREATIFITAS MAHASISWA</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="No" style="text-align: center;">5.</td>
                    <td>TANGGUNG JAWAB DALAM KERJA PRAKTIK</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="No" style="text-align: center;">6.</td>
                    <td>KOMUNIKASI</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="No" style="text-align: center;">7.</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="No" style="text-align: center;">8.</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="No" style="text-align: center;">9.</td>
                    <td></td>
                    <td></td>
                </tr>

              </table>

        </div> --}}

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