@extends('layouts.layout-dashboard')

@section('content')

    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('components.navbar')

            @include('components.sidebar-tata-usaha')

            
            <div class="main-content">

                <div class="wizard-steps">
                    <div class="wizard-step">
                        <div class="wizard-step-icon">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <div class="wizard-step-label">
                            Permohonan Masuk
                        </div>
                    </div>
                    <div class="wizard-step">
                        <div class="wizard-step-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="wizard-step-label">
                            Cek Permohonan
                        </div>
                    </div>
                    <div class="wizard-step">
                        <div class="wizard-step-icon">
                            <i class="fas fa-upload"></i>
                        </div>
                        <div class="wizard-step-label">
                            Lanjutkan ke Koordinator
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Permohonan Yudisium</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="table-2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="table-2_length"><label>Show <select
                                                    name="table-2_length" aria-controls="table-2"
                                                    class="form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="table-2_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="table-2"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped dataTable no-footer" id="table-2" role="grid"
                                            aria-describedby="table-2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="text-center sorting_asc" rowspan="1" colspan="1"
                                                        aria-label="
                            
                              
                              &amp;nbsp;
                            
                          "
                                                        style="width: 83.3438px;">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup"
                                                                data-checkbox-role="dad" class="custom-control-input"
                                                                id="checkbox-all">
                                                            <label for="checkbox-all"
                                                                class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="table-2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Task Name: activate to sort column ascending"
                                                        style="width: 252.562px;">Task Name</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1"
                                                        aria-label="Progress" style="width: 135.578px;">Progress</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1"
                                                        aria-label="Members" style="width: 339.438px;">Members</th>
                                                    <th class="sorting" tabindex="0" aria-controls="table-2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Due Date: activate to sort column ascending"
                                                        style="width: 163.344px;">Due Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="table-2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Status: activate to sort column ascending"
                                                        style="width: 190.828px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="table-2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending"
                                                        style="width: 137.906px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>




                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup"
                                                                class="custom-control-input" id="checkbox-1">
                                                            <label for="checkbox-1"
                                                                class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>Create a mobile app</td>
                                                    <td class="align-middle">
                                                        <div class="progress" data-height="4" data-toggle="tooltip"
                                                            title="" data-original-title="100%"
                                                            style="height: 4px;">
                                                            <div class="progress-bar bg-success" data-width="100%"
                                                                style="width: 100%;"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img alt="image" src="assets/img/avatar/avatar-5.png"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="" data-original-title="Wildan Ahdian">
                                                    </td>
                                                    <td>2018-01-20</td>
                                                    <td>
                                                        <div class="badge badge-success">Completed</div>
                                                    </td>
                                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup"
                                                                class="custom-control-input" id="checkbox-2">
                                                            <label for="checkbox-2"
                                                                class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>Redesign homepage</td>
                                                    <td class="align-middle">
                                                        <div class="progress" data-height="4" data-toggle="tooltip"
                                                            title="" data-original-title="0%" style="height: 4px;">
                                                            <div class="progress-bar" data-width="0" style="width: 0px;">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img alt="image" src="assets/img/avatar/avatar-1.png"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="" data-original-title="Nur Alpiana">
                                                        <img alt="image" src="assets/img/avatar/avatar-3.png"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="" data-original-title="Hariono Yusup">
                                                        <img alt="image" src="assets/img/avatar/avatar-4.png"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="" data-original-title="Bagus Dwi Cahya">
                                                    </td>
                                                    <td>2018-04-10</td>
                                                    <td>
                                                        <div class="badge badge-info">Todo</div>
                                                    </td>
                                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup"
                                                                class="custom-control-input" id="checkbox-3">
                                                            <label for="checkbox-3"
                                                                class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>Backup database</td>
                                                    <td class="align-middle">
                                                        <div class="progress" data-height="4" data-toggle="tooltip"
                                                            title="" data-original-title="70%"
                                                            style="height: 4px;">
                                                            <div class="progress-bar bg-warning" data-width="70%"
                                                                style="width: 70%;"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img alt="image" src="assets/img/avatar/avatar-1.png"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="" data-original-title="Rizal Fakhri">
                                                        <img alt="image" src="assets/img/avatar/avatar-2.png"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="" data-original-title="Hasan Basri">
                                                    </td>
                                                    <td>2018-01-29</td>
                                                    <td>
                                                        <div class="badge badge-warning">In Progress</div>
                                                    </td>
                                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup"
                                                                class="custom-control-input" id="checkbox-4">
                                                            <label for="checkbox-4"
                                                                class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>Input data</td>
                                                    <td class="align-middle">
                                                        <div class="progress" data-height="4" data-toggle="tooltip"
                                                            title="" data-original-title="100%"
                                                            style="height: 4px;">
                                                            <div class="progress-bar bg-success" data-width="100%"
                                                                style="width: 100%;"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img alt="image" src="assets/img/avatar/avatar-2.png"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="" data-original-title="Rizal Fakhri">
                                                        <img alt="image" src="assets/img/avatar/avatar-5.png"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="" data-original-title="Isnap Kiswandi">
                                                        <img alt="image" src="assets/img/avatar/avatar-4.png"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="" data-original-title="Yudi Nawawi">
                                                        <img alt="image" src="assets/img/avatar/avatar-1.png"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="" data-original-title="Khaerul Anwar">
                                                    </td>
                                                    <td>2018-01-16</td>
                                                    <td>
                                                        <div class="badge badge-success">Completed</div>
                                                    </td>
                                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="table-2_info" role="status"
                                            aria-live="polite">Showing 1 to 4 of 4 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="table-2_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="table-2_previous"><a href="#" aria-controls="table-2"
                                                        data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                </li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="table-2" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item next disabled" id="table-2_next"><a
                                                        href="#" aria-controls="table-2" data-dt-idx="2"
                                                        tabindex="0" class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
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
