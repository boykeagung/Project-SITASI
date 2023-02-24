<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
        @page {
            margin-top:0.2in;
            margin-bottom: 0.79in;
            margin-left: 1.25in;
            margin-right: 0.8in;

        }
        /* * { padding: 0; margin: 0; } */
        /* @font-face {
            font-family: "source_sans_proregular";           
            src: local("Source Sans Pro"), url("fonts/sourcesans/sourcesanspro-regular-webfont.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;

        }         */
        @font-face {
            font-family: Gothic; src: url('public/Fonts/century_gothic.ttf');
            font-family: Calibri; src: url('../Fonts/calibri_regular.ttf');
            font-family: TNR; src: url('../Fonts/times new roman.ttf');
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
    

    <title>Form-001</title>
</head>
<body>

    <script> 

        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var n = new Date();
        var y = n.getFullYear();
        var m = n.getMonth();
        var d = n.getDate();
        document.getElementById("date").innerHTML = d + " " + months[m] + " " + y;

    </script>
    
    <p class="top" > <b> PROGRAM STUDI SISTEM INFORMASI <br>
        Institut Teknologi Nasional <br>
        Jl. PKH. Mustafa No. 23 <br>
        Bandung </b>
    </p>

    <center> <h4 class="sub-title" style="margin-top: -0.2in; font-size: 17px;"> <ins>Formulir Permohonan Kerja Praktek</ins></h4> </center>    
    
    {{-- <p class="solid">  <b>  A. Diisi Oleh Mahasiswa</b>
        
    </p>
    <p class="solid">  Yang bertanda tangan dibawah ini </p> --}}


    <div style="">

        <table style="width:100% ">
            <?php?>
            $tanggal 
            @foreach ($kp_form001 as $kp_form001) 
            <tr>   
              <td class="padding table-title" > <b> A. Diisi oleh Mahasiswa</b></td>
            </tr>
            <tr>
                <td class="padding p4">Yang bertanda tangan di bawah ini : <br>
                    <span class="tab-nrp"></span>Nama <span class="tab-II"></span>      : {{$kp_form001->nama}}  <br>
                    <span class="tab-nrp"></span>NRP   <span class="tab-I"></span>      : {{$kp_form001->username}} <br>
    
                    <p style="margin-top: 0.1in;">
                        Mengajukan Kerja Praktek bidang E Bisnis Sebagai bahan pertimbangan, saya lampirkan Daftar Kemajuan Belajar dan Proposal Kerja Praktek <br> <br>
                        Apabila permohonan ini diijinkan, kami mengusulkan perusahaan berikut ini agar dapat disetujui sebagai tempat pelaksanaan Kerja Praktek tersebut.
                    </p>
                    <table style="width:100% border: 1px solid white; ">
                        <tr class="">
                            <td class="padding p4 shrink td-border">
                                Alternatif I     <span class="tab-I"></span>      : Nama Perusahaan / Instansi : <br>
                            </td>
                            <td class="padding p4 td-border">
                                {{$kp_form001->perusahaan1}}<br>
                            </td>
                        </tr>
                        <tr >
                            <td class="padding p4 shrink td-border" style="vertical-align:top">
                                <span class="tab-III"></span>  Alamat  <span class="tab-alamat"></span>            :                          <br>
                            </td>
                            <td class="padding p4 td-border ">
                                {{$kp_form001->alamat_perusahaan1}}<br>
                            </td>
                        </tr>
                        <tr >
                            <td class="padding p4 shrink td-border" style="vertical-align:top">
                                <span class="tab-III"></span>  Bergerak di bidang  <span class="tab-bidang"></span>            :                          <br>
                            </td>
                            <td class="padding p4 td-border ">
                                {{$kp_form001->bidang_perusahaan1}}<br>
                            </td>
                        </tr>
                    </table>
                    <table style="width:100% border: 1px solid white; margin-top:0.1in ">
                        <tr class="">
                            <td class="padding p4 shrink td-border">
                                Alternatif II   <span class="tab-II"></span>      : Nama Perusahaan / Instansi : <br>
                            </td>
                            <td class="padding p4 td-border">
                                {{$kp_form001->perusahaan2}}<br>
                            </td>
                        </tr>
                        <tr >
                            <td class="padding p4 shrink td-border" style="vertical-align:top">
                                <span class="tab-III"></span>  Alamat  <span class="tab-alamat"></span>            :                          <br>
                            </td>
                            <td class="padding p4 td-border ">
                                {{$kp_form001->alamat_perusahaan2}}<br>
                            </td>
                        </tr>
                        <tr >
                            <td class="padding p4 shrink td-border" style="vertical-align:top">
                                <span class="tab-III"></span>  Bergerak di bidang  <span class="tab-bidang"></span>            :                          <br>
                            </td>
                            <td class="padding p4 td-border ">
                                {{$kp_form001->bidang_perusahaan2}}<br>
                            </td>
                        </tr>
                    </table>
    
                    <p>
                        Catatan,  <span class="tab-date"></span>Bandung,  <?php $datetime = new DateTime;
                            echo $datetime->format('j F Y'); ?> 
                        <br>
                        <span class="tab-pmhn"></span>Pemohon, 
                        <br>
                        Form ini harus dilampirkan <br>
                        Pada halaman pertama buku	<br>
                        Laporan Kerja Praktek <br>
                        <span class="tab-mhs"></span>  {{$kp_form001->nama}} 
                    </p>
                </td>
              </tr>
            <tr>
              <td class="padding table-title"><b> B. Diisi Oleh Dosen</b></td>
            </tr>
            <tr>
                <table style="width:100%; border: 1px solid white; ">
                    <tr>
                        <td class="padding p4 td-left" style="vertical-align:top">
                            Mahasiswa tersebut di atas <br>
                           
                            <ul style="margin-top: 0.01in">
                                <li> diijinkan / tidak diijinkan <br> 
                                </li>
                            </ul>
                                untuk Kerja Praktek
                            
                        </td>
    
                        <td class="padding p4 td-right " style="vertical-align:top; width: 38%;">
                            Tanda tangan Dosen Wali <br>
                            <br>
                            <br>
                            <br>
        
    
                            
                            (……………………………..)
                        </td>
                    </tr>
                </table>
              </tr>
            <tr>
            <tr>
              <td class="padding table-title"><b> C. Diisi oleh Ketua Program Studi Sistem Informasi</b> </td>
            </tr>
            <tr>
                <table style="width:100% " id="">
                    <tr>
                        <td class="padding p4 td-left" style="white-space: nowrap; vertical-align:top; ">
                            Dosen Pembimbing <br>
                            ……………………………………. <br>
                            <br>
                            Batas penyerahan Kerja Praktek <br>
                            ……………………………………. <br>
    
                        </td>
    
                        <td class="padding p4 td-right" style="width: 38%;">
                            Tanda tangan Ketua Program <br>
                             Studi Sistem Informasi <br>
                            <br>
                            <br>
                            <br>
    
    
                            <ins > <b> Mira Musrini B., S.Si.,MT. <br>
                            NPP: 120070201</b></ins>
                            
                        </td>
                    </tr>
                </table>
            </tr>
            <tr> 
            <tr>
              <td class="padding table-title"><b> D. Diisi oleh Dosen Pembimbing Kerja Praktek</b></td>
            </tr>
            <tr>
                <table style="width:100%" >
                    <tr style="width:100% ">
                        <td class="padding p4  td-left " style="vertical-align:top"> 
                            Pembicaraan Awal tanggal   :………………………… <br>
                            Pembicaraan Akhir tanggal  :………………………… 
                            <br>
                            <br>
                            Nilai Kerja Praktek               :     A     B    C    D    E <br> <br>
                            <b> Catatan tentang tempat Kerja Praktek (kalau ada)</b> <br>
                            
                        </td>
    
                        <td class="padding p4  td-right " style="vertical-align:top; width: 38%;">Tanda tangan <br>
                            Dosen Pembimbing KP <br>
                            <br>
                            <br>
                            <br>
                            
                            
                            (……………………………..)
                        </td>
                    </tr>
                </table>
            </tr>
    
    
            @endforeach
          </table>
    </div>
    
   
</body>
</html>