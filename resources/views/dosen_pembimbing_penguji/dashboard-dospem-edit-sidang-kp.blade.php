@extends('layout.layout-dospem-dospenguji-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-dospem-dospenguji-ta')

        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form action="{{ url('dashboard-dospem-sidang-kp',$sidang_kp->id)}}" method="POST"
                    enctype="multipart/form-data">
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
                                                        <textarea type="text" class="form-control" name="komentar1"
                                                            rows="3"
                                                            placeholder="Komentar">{{$sidang_kp->komentar1}}</textarea>
                                                    </div>
                                                    {{-- <div class="form-group col-md-6">
                                                        <label for="inputStatus">Status</label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="status" id="select2">
                                                            <option value="Diproses">Diproses</option>
                                                            <option value="Ditolak">Ditolak</option>
                                                            <option value="Diterima">Diterima</option>
                                                        </select>
                                                    </div> --}}
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
    </div>
</div>
@endsection