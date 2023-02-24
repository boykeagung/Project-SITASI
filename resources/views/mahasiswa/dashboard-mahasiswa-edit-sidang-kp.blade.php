@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')
        {{-- {!! Form::model($seminar,['url'=>'dashboard-mahasiswa-seminar-ta/'.$seminar->id,'method'=>'PUT'])!!} --}}


        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form action="{{ url('dashboard-mahasiswa-sidang-kp',$sidang_kp->id)}}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Daftar Seminar Tugas Akhir</h2>
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
                                                        <label for="inputJudul">Laporan KP<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input type="file" class="form-control" name="laporan">
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                            25MB</span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Ruangan Sidang<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="ruangan"
                                                            value="{{$sidang_kp->ruangan}}" placeholder="Ruangan ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Jam Sidang<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="time" class="form-control" name="jam_sidang"
                                                            value="{{$sidang_kp->jam_sidang}}" placeholder="Jam Sidang">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Tanggal Sidang<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="date" class="form-control" name="tanggal_sidang"
                                                            value="{{$sidang_kp->tanggal_sidang}}"
                                                            placeholder="Tanggal Sidang">
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
        {{-- {!! Form::close()!!} --}}
    </div>
</div>
@endsection