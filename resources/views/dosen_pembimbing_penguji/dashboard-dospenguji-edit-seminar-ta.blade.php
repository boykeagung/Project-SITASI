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
                <form action="{{ url('dashboard-dospenguji-seminar-ta',$seminar->id)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Edit Seminar TA</h2>
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
                                                        <label for="inputTanggal">Komentar Penguji</label><br>
                                                        <textarea type="text" class="form-control" name="komentar2" rows="3" placeholder="Komentar">{{$seminar->komentar2}}</textarea>
                                                    </div>
                                                    @if($seminar->penguji1 == Auth::user()->username."_".Auth::user()->name)
                                                    <div class="form-group col-md-6">
                                                        <label for="inputStatus">Status</label><br>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="status">
                                                            <option value="Diproses">Diproses</option>
                                                            <option value="Lulus">Lulus</option>
                                                            <option value="Tidak Lulus">Tidak Lulus</option>
                                                        </select>
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
            @include('footer')
        </div>
    </div>
</div>
@endsection