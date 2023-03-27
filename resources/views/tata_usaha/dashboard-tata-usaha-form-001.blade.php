@extends('layout.layout-tata-usaha')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-tata-usaha')

        <!-- Main Content -->
        <div class="main-content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Permohonan Kerja Praktik (Form-001)</h4>
                            </div>
                            <div class="card-body table-responsive">
                                    
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Perusahaan 1 </th>
                                            <th>Alamat Perusahaan 1</th>
                                            <th>Bidang Perusahaan 1</th>
                                            {{-- <th>Perusahaan 2 </th>
                                            <th>Alamat Perusahaan 2</th>
                                            <th>Bidang Perusahaan 2</th> --}}
                                            {{-- <th>Hasil Form-001</th> --}}
                                            <th>Status</th>
                                            <th>Form-001</th>
                                            <th>Surat Pengantar</th>
                                            <th>Action</th>
                                    
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 0?>
                                        @foreach ($kp_form001 as $kp_form001)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$kp_form001->username}}</td>
                                            <td>{{$kp_form001->nama}}</td>
                                            <td>{{$kp_form001->perusahaan1}}</td>
                                            <td>{{$kp_form001->alamat_perusahaan1}}</td>
                                            <td>{{$kp_form001->bidang_perusahaan1}}</td>
                                            {{-- <td>{{$kp_form001->perusahaan2}}</td>
                                            <td>{{$kp_form001->alamat_perusahaan2}}</td>
                                            <td>{{$kp_form001->bidang_perusahaan2}}</td> --}}
                                            {{-- <td>{{link_to('mahasiswa-generate-form-001/'.$kp_form001->id,'Download',['class'=>'btn btn-success', 'target'=>'_blank'])}}</td> --}}
                                            <td>{{$kp_form001->status}}</td>
                                            <td>
                                                @if($kp_form001->pdf_form001 == null)
                                                {{link_to('Form_001/'.$kp_form001->pdf_form001,'Belum Di Upload',['class'=>'btn btn-danger disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('Form_001/'.$kp_form001->pdf_form001,'Lihat',['class'=>'btn btn-info ','target'=>'_blank'])}}
                                                @endif
                                                
                                            </td>
                                            <td>
                                                @if($kp_form001->surat == null)
                                                {{link_to('Surat_Pengantar/'.$kp_form001->surat,'Belum Di Upload',['class'=>'btn btn-danger disabled','target'=>'_blank'])}}
                                                <br>
                                                <span>*tekan edit untuk tambah file*</span>
                                                @else
                                                {{link_to('Surat_Pengantar/'.$kp_form001->surat,'Lihat',['class'=>'btn btn-info ','target'=>'_blank'])}}
                                                @endif
                                            </td>
                                            <td>{{link_to('dashboard-tata-usaha-edit-form-001/'.$kp_form001->id,'Edit',['class'=>'btn btn-warning'])}}</td>
                                        
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