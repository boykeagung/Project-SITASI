@extends('layout.layout-koordinator-kp')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-kp')

        <!-- Main Content -->
        <div class="main-content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Nilai Kerja Praktik</h4>
                            </div>
                            <div class="card-body table-responsive">  
                                    <table class="table table-bordered table-striped" style="width: 100%" id="table3">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">NRP</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center" style="white-space: nowrap;">Nilai <br> Dosen Pembimbing</th> 
                                                <th class="text-center">Dosen <br> Pembimbing Perusahaan</th>
                                                <th class="text-center">Nilai <br> Sidang Penguji</th>
                                                <th class="text-center">Nilai <br> Sidang Pembimbing</th>
                                                <th class="text-center">Nilai Akhir</th>
                                                <th class="text-center">Action</th>
                                                {{-- <th>Nilai Akhir</th> --}}
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <tr>
                                                <?php $no = 0?>
                                                @foreach ($nilai_koordinator_kp  as $nilai)
                                                <td class="text-center" style="font-size: 16px">{{1+$no++}}</td>
                                                <td class="text-center" style="font-size: 16px">{{$nilai->username}}</td>
                                                <td style="font-size: 16px" style="font-size: 16px">{{$nilai->name}}</td>
                                                <td class="text-center" style="font-size: 16px">{{$nilai->rataDospem}}</td>
                                                <td class="text-center" style="font-size: 16px">{{$nilai->rataDospemPer}}</td>
                                                <td class="text-center" style="font-size: 16px">{{$nilai->sidang_penguji}}</td>
                                                <td class="text-center" style="font-size: 16px">{{$nilai->sidang_pembimbing}}</td>
                                                <td class="text-center" style="font-size: 16px">{{$nilai->nilai_akhir}}</td>
                                                <td class="text-center"><a href="{{'dashboard-koordinator-edit-penilaian-kp/'.$nilai->id}}" class="btn btn-warning "><i class="far fa-edit"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                   </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            
            @include('footer')
        </div>
    </div>
</div>
@endsection