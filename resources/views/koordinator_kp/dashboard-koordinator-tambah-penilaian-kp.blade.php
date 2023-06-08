@extends('layout.layout-koordinator-kp')


@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-kp')
        {{-- {!! Form::Open(['url'=>'dashboard-mahasiswa-seminar-ta'])!!} --}}


        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form action="dashboard-koordinator-penilaian-kp" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Input Nilai Sidang Kerja Praktik</h3>
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
                                                        <label for="inputNrp">NRP</label><br>
                                                        <input class="form-control" type="text" value="{{Auth::user()->username}}" name="username" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputNrp">Nama</label><br>
                                                        <input class="form-control" type="text" value="{{Auth::user()->name}}" name="name" readonly>
                                                    </div>
                                                </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Nilai Sidang Penguji</label>
                                                        <br>
                                                        <input type="text" class="form-control"
                                                            name="sidang_penguji"
                                                            placeholder=" ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Nilai Sidang Pembimbing</label>
                                                        <br>
                                                        <input type="text" class="form-control"
                                                            name="sidang_pembimbing"
                                                            placeholder=" ">
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