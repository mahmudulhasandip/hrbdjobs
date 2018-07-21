
@extends('admin.layout.admin')

@section('content')
@include('admin.layout.partialLayouts.alert')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                CV Bank
            </h3>
        </div>

    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        CV List
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">


            {{-- Add Industry --}}
            <div class="m-form m-form--label-align-right  m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-12 order-2 order-xl-1">
                        <form class="m-form m-form--fit m-form--label-align-right" method='post' action="{{ route('admin.cvbank.filter') }}">
                            @csrf
                            <div class="form-group m-form__group">
                                <label>
                                    Find CV
                                </label>
                                <div class="input-group">
                                    {{-- skills --}}
                                    <select name="skill" class="form-control m-bootstrap-select m_selectpicker" id="skill" data-live-search="true">
                                        <option value="">Skill</option>
                                        @foreach($skills as $skill)
                                        <option value="{{ $skill['id'] }}" {{ ($skill['id'] == $skill_selected) ? 'selected' : ''}}>{{ $skill['name'] }}</option>
                                        @endforeach
                                    </select>
                                    {{-- experience --}}
                                    <select name="experience" class="form-control m-bootstrap-select m_selectpicker" id="experience" >
                                        <option value="">Experience</option>
                                        @foreach($experiences as $experience)
                                        <option value="{{ $experience['name'] }}" {{ ($experience['id'] == $experience_selected) ? 'selected' : ''}}>{{ $experience['name'] }}</option>
                                        @endforeach
                                    </select>
                                    {{-- university --}}
                                    <select name="institute" class="form-control m-bootstrap-select m_selectpicker" id="university" data-size="10" data-live-search="true">
                                        <option value="">University</option>
                                        @foreach($institutes as $institute)
                                        <option value="{{ $institute['id'] }}" {{ ($institute['id'] == $institute_selected) ? 'selected' : ''}}>{{ $institute['name'] }}</option>
                                        @endforeach
                                    </select>
                                    {{-- job level --}}
                                    <select name="job_level" class="form-control m-bootstrap-select m_selectpicker" id="job_level" >
                                        <option value="">Job Level</option>
                                        @foreach($job_levels as $job_level)
                                        <option value="{{ $job_level['id'] }}" {{ ($job_level['id'] == $job_level_selected) ? 'selected' : ''}}>{{ $job_level['name'] }}</option>
                                        @endforeach
                                    </select>
                                    {{-- job designation --}}
                                    <select name="designation" class="form-control m-bootstrap-select m_selectpicker" id="designation" data-size="10" data-live-search="true">
                                        <option value="">Designation</option>
                                        @foreach($designations as $designation)
                                        <option value="{{ $designation['id'] }}" {{ ($designation['id'] == $designation_selected) ? 'selected' : ''}}>{{ $designation['name'] }}</option>
                                        @endforeach
                                    </select>
                                    {{-- job category --}}
                                    <select name="category" class="form-control m-bootstrap-select m_selectpicker" id="category" data-size="10" data-live-search="true">
                                        <option value="">Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category['id'] }}" {{ ($category['id'] == $category_selected) ? 'selected' : ''}}>{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="mdl-data-table table table-striped table-bordered" id="html_table" width="100%">
                <thead>

                    <tr>

                        <th title="Field #1">
                            ID
                        </th>
                        <th title="Field #2">
                            Name
                        </th>
                        <th title="Field #3">
                            Email
                        </th>
                        <th title="Field #4">
                            Address
                        </th>
                        <th title="Field #5">
                            City
                        </th>
                        <th title="Field #6">
                            Applied Jobs
                        </th>
                        <th title="Field #6">
                            Stauts
                        </th>
                        <th title="Field #3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $id= 1;
                    @endphp

                    @foreach( $cvs as $cv )
                    <tr>
                        <td>
                            {{ $id++ }}
                        </td>
                        <td>
                            <img src="{{ asset('storage/uploads/'.(($cv->dp) ? $cv->dp : 'default_user.png'))}}" alt="photo" class="rounded" width="50"> {{ $cv->fname }} {{ $cv->lname }}
                        </td>
                        <td>
                            {{ $cv->email }}
                        </td>
                        <td>
                            {{ $cv->current_address }}
                        </td>
                        <td>
                            {{ $cv->city }}
                        </td>
                        <td>
                            {{ $cv->appliedJob->count() }}
                        </td>
                        <td>
                            {{-- {{ $cv->current_address }} --}}
                            <button type="button" class="btn m-btn--pill m-btn--air {{ ($cv->verified) ? 'btn-success' : 'btn-danger' }}">
                                {{ ($cv->verified) ? 'Active' : 'Inactive' }}
                            </button>
                        </td>
                        <td>
                            <span style="overflow: visible; position: relative; width: 110px;">
                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                    <i class="la la-edit"></i>
                                </a>
                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                                    <i class="la la-trash"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
@endpush


@push('js')

<!--begin::Page Resources -->

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<script>
    var box = $('.m-portlet__body');
    $('#add_industry').on('click', function (e) {
        e.preventDefault();
        box.toggleClass('d-none');

    });
</script>

<script>

$('#html_table').DataTable( {
    columnDefs: [
        {
            targets: [ 0, 1, 2, 3, 4, 5, 6, 7],
            className: 'mdl-data-table__cell--non-numeric'
        }
    ],
    responsive: true,
    fixedColumns: true
});

</script>

<script>
    var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
</script>


@endpush