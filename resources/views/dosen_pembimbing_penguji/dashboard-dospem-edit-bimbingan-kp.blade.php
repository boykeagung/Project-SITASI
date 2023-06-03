@extends('layout.layout-koordinator-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-dospem-dospenguji-ta')

        {{-- {!! Form::Open(['url'=>'dashboard-mahasiswa-proposal-ta/proposal'])!!} --}}


        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form action="{{ url('dashboard-dospem-bimbingan-kp',$bimbingan_kp->id)}}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Edit Bimbingan Kerja Praktik Mahasiswa</h2>
                    </div>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br />
                        @endforeach
                    </div>
                    @endif
                    <div class="card-body">
                        <!-- SAVED FOR ACCORDION -->
                        <div class="accordion-pendaftaran">
                            <div class="accordion-pendaftaran-item">
                                <div class="accordion-pendaftaran-item-body">
                                    <div class="accordion-pendaftaran-item-content">
                                        <div class="data-mahasiswa">
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputidta">kode Bimbingan Kerja Praktik<span
                                                                style="color: red;">*</span>
                                                        </label>
                                                        <br>

                                                        <input class="form-control" type="text" name="id_bta"
                                                            placeholder="ID BTA" value="{{$bimbingan_kp->id_bkp}}"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputidta">kode Kerja Praktik<span
                                                                style="color: red;">*</span>
                                                        </label>
                                                        <br>

                                                        <input class="form-control" type="text" name="id_ta"
                                                            placeholder="ID TA" value="{{$bimbingan_kp->id_kp}}"
                                                            disabled>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Waktu Bimbingan</label><br>

                                                        <input class="form-control" type="date" name="tanggal_bimbingan"
                                                            placeholder="Judul Tugas Akhir"
                                                            value="{{$bimbingan_kp->tanggal_bimbingan}}" disabled>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Kegiatan Bimbingan</label><br>
                                                       
                                                        <textarea class="form-control" type="text" name="kegiatan"
                                                            placeholder="Kegiatan Bimbingan" disabled>{{$bimbingan_kp->kegiatan}}</textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputidta">Status</label>
                                                        <br>

                                                        <select class="form-select" aria-label="Default select example"
                                                            name="status_p1">

                                                            <option value="Diproses"
                                                                {{ $bimbingan_kp->status_p1=="Diproses" ? 'selected': ''}}>
                                                                Diproses</option>

                                                            <option value="Diterima"
                                                                {{ $bimbingan_kp->status_p1=="Diterima" ? 'selected': ''}}>
                                                                Diterima</option>

                                                            <option value="Ditolak"
                                                                {{ $bimbingan_kp->status_p1=="Ditolak" ? 'selected': ''}}>
                                                                Ditolak</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        {!! Form::submit('Save',['class'=>'btn btn-primary mb-5
                                                        mt-3'])!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @include('footer')
        </div>
        {!! Form::close()!!}
    </div>
</div>
@endsection
