@extends('layout.layout-tata-usaha')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-tata-usaha')
        {{-- {!! Form::Open(['url'=>'dashboard-tata-usaha-tambah-data-mahasiswa'])!!} --}}


        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form class="needs-validation" action="{{ url('tata_usaha.dashboard-tata-usaha-form-001',$kp_form001->id)}}" method="POST" 
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="card-header row">
                        <h3 class="section-title col-8">Edit Data Mahasiswa</h2>
                    </div>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br />
                        @endforeach
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="data-mahasiswa">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputNRP" class="form-label">NRP<span
                                                style="color: red;">*</span></label>
                                      
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