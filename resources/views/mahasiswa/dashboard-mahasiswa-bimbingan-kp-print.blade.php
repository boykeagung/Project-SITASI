<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Bimbingan Tugas Akhir</title>
    <style>

        @font-face {
            font-family: Gothic; src: url('public/Fonts/century_gothic.ttf');
            font-family: Calibri; src: url('../Fonts/calibri_regular.ttf');
            font-family: TNR; src: url('../Fonts/times new roman.ttf');
        }
        
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

        .tab-nama {
            display: inline-block;
            margin-left: 27px;
        }
        .tab-nrp {
            display: inline-block;
            margin-left: 32px;
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
        .col {
        float: left;
        width: 50%;
        }

        .col-left {
        float: left;
        width: 40%;
        }
        .col-right {
        float: left;
        width: 60%;
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

        <h2 style=" margin-top:2; text-align:center; font-weight: normal; font-size: 100%; text-decoration: underline;  ">
            DAFTAR HADIR BIMBINGAN PELAKSANAN KERJA PRAKTEK (KP) DI    <br>
            PROGRAM STUDI SISTEM INFORMASI ITENAS BANDUNG <br>
            
        </h2>

        <div class="row">
            <div class="col-left">
                <p>Nama <span class="tab-nama"></span>      ::{{ Auth::user()->name }}</td> </p>
                <p>NRP <span class="tab-nrp"></span>       ::{{ Auth::user()->username }}</td> </p>
            </div>
            <div class="col-right">
                <p>Nama Dosen Pembimbing : </p>
                <p>Bidang Kompetensi : </p>

            </div>
            

        </div>

        <div style="margin-top:25">
            <table class="table table-bordered" id="table1" style="width:100%">
                <thead>
                    <tr style="font-size:13">
                        <th class="width:1%">No</th>
                        <th style="padding:10px;">Waktu Bimbingan</th>
                        <th style="padding:10px; width: 55%">Kegiatan Bimbingan</th>
                        <th style="padding:10px;">Tanda Tangan Pembimbing</th>

                    </tr>
 
                </thead>
        
                <tbody>
                    <?php $no = 0?>
                    @foreach ($bimbingan_kp as $bkp)
                    @if($bkp->status_p1 == 'Diterima')
                    <tr>
                        <td style="text-align: center;">{{1+$no++}}</td>
                        <td style="text-align: center; padding:15">{{$bkp->tanggal_bimbingan}}</td>
                        <td style="text-align: center">{{$bkp->kegiatan}}</td>
                        <td style="text-align: center"></td>
                    </tr>
                    @endif
                    @endforeach
        
                </tbody>
            </table>
        </div>

        <div>
            <p style="font-size:11">
                Catatan: <br>
                1. Minimum bimbingan untuk Kerja Praktek adalah 4x dan untuk bimbingan Tugas Akhir adalah 6x untuk setiap dosen pembimbing <br>
                2. Absensi bimbingan ini menentukan tingkat keabsahan Kerja Praktik. <br>
                Keterangan: *) Coret yang tidak perlu

            </p>
        </div>
    
</body>
</html>