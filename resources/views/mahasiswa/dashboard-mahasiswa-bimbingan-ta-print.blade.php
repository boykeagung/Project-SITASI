<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Bimbingan Tugas Akhir</title>
    <style>
        @font-face {
            font-family: Gothic;
            src: url('public/Fonts/century_gothic.ttf');
            font-family: Calibri;
            src: url('../Fonts/calibri_regular.ttf');
            font-family: TNR;
            src: url('../Fonts/times new roman.ttf');
        }

        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        }

        table,
        th,
        td {
            border: 1px solid;
            border-collapse: collapse;
        }

        .No {
            width: 7%;
            padding: 10px;
        }

        .p1 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            /* font-size: 20px; */

        }

        .sub-title {
            font-family: Calibri;
            font-size: 20px;
        }

        .table-title {
            font-family: Gothic, sans-serif;
            font-size: 14px;
        }

        .p4 {
            font-family: TNR;
            font-size: 15px;
        }


        body {
            font-family: "source_sans_proregular", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif, Century 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        p.solid {
            border: 1px solid black;
            padding-left: 0.1in;
            border-style: solid;
        }


        table,
        th,
        td {
            /* padding-left: 0.1in; */
            border: 1px solid black;
            border-collapse: collapse;
        }

        .td-border {
            border-left: 1px solid white;
            border-right: 1px solid white;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
        }

        .td-left {
            border-left: 1px solid white;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
        }

        .td-right {
            border-right: 1px solid white;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
        }

        td.padding {
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
    <div class="">
        <p style="text-align:center; margin: 0"> <b> YAYASAN PENDIDIKAN DAYANG SUMBI<br></p>
        <h2 style=" text-align:center; margin : 0; ">
            INSTITUT TEKNOLOGI NASIONAL <br>
        </h2>
        <p style="text-align:center; margin : 0; padding-top:0"><b> FAKULTAS TEKNOLOGI INDUSTRI<br></p>

        <p style=" text-align:center; margin: 0 "> <b>PROGRAM STUDI SISTEM INFORMASI</b></p>

        <p style=" text-align:center; font-weight: normal; font-size:6.7 ">
            Jl. PKH. Hasan Mustafa No. 23 Bandung 40124 Indonesia,
            Telepon +62-22-7272215 ext 181,
            Fax: +62-22-7202892 <br>
            Website: http://www.itenas.ac.id, email: miai@itenas.ac.id
        </p>

        <hr style="margin-left: 10px; margin-right: 10px">

        <h4
            style=" margin-top:2; text-align:center; font-weight: normal; font-size: 85%; text-decoration: underline;  ">
            ABSENSI BIMBINGAN PELAKSANAAN TUGAS AKHIR (TA) *
        </h4>

        <div>
            <table style="width:100% ">
                <tr>
                    <td>
                        <table style="width:100% border: 1px solid white; ">
                            <tr style="padding">
                                <td style="padding:10px" class="padding p4 shrink td-border">Nama<span
                                        class="tab-I" ></span>:{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td style="padding:10px" class="padding p4 shrink td-border">NRP<span
                                        class="tab-I"></span>:{{ Auth::user()->username }}</td>
                            </tr>
                            <tr>
                                <td style="padding:10px" class="padding p4 shrink td-border">Judul
                                    {{-- @foreach ($bimbingan_ta as $bta => $bimbinganTA)
                                    @if ($bta > 0)
                                    @if ($bimbinganTA->judul !== "$bta->judul")
                                    Judul TA: {{ $bimbinganTA->judul }}<br>
                                    @endif
                                    @endif
                                    @endforeach --}}
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:10px" class="padding p4 shrink td-border">Nama Dosen Pembimbing <span
                                        class="tab-I"></span> :</td>
                            </tr>
                            <tr>
                                <td style="padding:10px" class="padding p4 shrink td-border">Ko. Pembimbing <span
                                        class="tab-I"></span> :</td>
                            </tr>
                        </table>
                    </td>

                    <td style="width: 20%;" class="p4">
                        <ins>Photo 3*4</ins>
                    </td>
                </tr>
            </table>
        </div>

        <div style="margin-top:20;">
            <table style="width: 100%; margin-top: 10px; font-size: 0.8em; border: 1px;" id="table1">
                <thead>
                    <tr style="align:center">
                        <th style="width:5% " rowspan="2">No</th>
                        <th style="padding:10px; width:20%  " rowspan="2">Waktu <br> Bimbingan</th>
                        <th style="padding:15px; width: 40%;" rowspan="2">Kegiatan Bimbingan</th>
                        <th style="padding:15px; width:30% " colspan="2">Paraf Bimbingan</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>2</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0?>
                    @foreach ($bimbingan_ta as $bta)
                    @if($bta->status == 'Diterima')
                    <tr>
                        <td style="text-align: center; padding:18px;">{{1+$no++}}</td>
                        <td style="text-align: center">{{$bta->tanggal_bimbingan}}</td>
                        <td style="text-align: center">{{$bta->kegiatan}}</td>
                        <td style="text-align: center"></td>
                        <td style="text-align: center"></td>
                    </tr>
                    @else
                    @endif
                </tbody>
                @endforeach
            </table>

        </div>


        <div>
            <p style="font-size:11">
                Catatan: <br>
                1. Minimum bimbingan untuk bimbingan Tugas Akhir adalah 8x untuk setiap dosen pembimbing
            </p>
        </div>

</body>

</html>
