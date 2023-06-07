@extends('layout.layout-dospem-dospenguji-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-dospem-dospenguji-ta')
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary mb-0">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary mb-0">
                            <div class="card-header">
                                <h4>Data Sidang Tugas Akhir</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>    
                                            <th>No</th>                             
                                            <th class="col-md-3">NRP</th>
                                            <th class="col-md-3">Nama Lengkap</th>
                                            <th>Judul TA</th>
                                            <th>Buku TA</th>
                                            <th>Ruangan</th>
                                            <th>Jam Sidang</th>
                                            <th>Jadwal Sidang</th>
                                            <th>Status</th>
                                            <th>Komentar Pembimbing</th>
                                            <th>Komentar Penguji</th>
                                            <th>Update at</th>
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0
                                        ?>
                                        @foreach ($sidang_ta as $no => $sta)
                                        <tr>    
                                            <td>{{1+$no++}}</td>                                                         
                                            <td>{{$sta->username}}</td>
                                            <td>{{$sta->name}}</td>
                                            <td>{{$sta->judul}}</td>
                                            <td>
                                                @if($sta->buku_ta == null)
                                                {{link_to('Draft_Buku_TA/'.$sta->buku_ta,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('Draft_Buku_TA/'.$sta->buku_ta,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}}
                                                @endif
                                            </td>                                                   
                                            <td>{{$sta->ruangan}}</td>
                                            <td>{{$sta->jam_sidang}}</td>
                                            <td>{{$sta->jadwal_sidang}}</td>
                                            <td>{{$sta->status}}</td>
                                            <td>{{$sta->komentar1}}</td>
                                            <td>{{$sta->komentar2}}</td>
                                            <td>{{$sta->updated_at}}</td>
                                            <td class="text-center" width="160px">
                                                <div class="row">
                                                    <div class="col">
                                                       {{link_to('dashboard-dospem-sidang-ta-edit-data/'.$sta->id,'Edit',['class'=>'btn btn-warning'])}}
                                                   </div>
                                               </div>             
                                            </td>
                                            {{-- <td class="text-center" width="160px">
                                                <div class="row">
                                                    <div class="col">
                                                        {!! Form::open(['url'=>'dashboard-koordinator-sidang-ta/'.$sta->id,'method'=>'delete'])!!}
                                                        {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'return confirm("Are you sure?")'])!!}
                                                        {!! Form::close()!!}
                                                    </div>
                                                </div>
                                            </td> --}}
                                            
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