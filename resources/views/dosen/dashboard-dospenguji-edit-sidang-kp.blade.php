@extends('layouts.layout-dashboard')

@section('content')

<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>

        @include('components.navbar')

        @include('components.sidebar-dospem-dospenguji-ta')

        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form action="{{ url('dashboard-dospenguji-sidang-kp',$sidang_kp->id)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Edit Sidang KP</h2>
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
                                                    <div class="form-group col-md-12">
                                                        <label for="inputTanggal">Komentar Pembimbing</label><br>
                                                        <textarea type="text" class="form-control" name="komentar1" rows="3" placeholder="Komentar">{{$sidang_kp->komentar1}}</textarea>
                                                    </div>
                                                    @if($sidang_kp->penguji1 = Auth::user()->username."_".Auth::user()->name)
                                                    <div class="form-group col-md-6">
                                                        <label for="inputStatus">Status</label><br>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="status">
                                                            <option value="Diproses">Diproses</option>
                                                            <option value="Lulus">Lulus</option>
                                                            <option value="Tidak Lulus">Tidak Lulus</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Nilai</label>
                                                        <br>
                                                        <input type="file" class="form-control" name="nilai"
                                                            placeholder="tanggal selesai KP">
                                                            <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                                25MB</span>
                                                    </div>
                                                    @else
                                                    @endif
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
            @include('components.footer')
        </div>
    </div>
</div>
@endsection

@push('plugins-css')
@endpush

@push('template-css')
@endpush

@push('plugins-css')
@endpush

@push('specific-js')
@endpush