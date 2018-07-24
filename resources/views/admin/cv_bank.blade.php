
@extends('admin.layout.admin')

@section('content')
{{-- @include('admin.layout.partialLayouts.alert') --}}
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
                        Candidates List
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">


            {{-- Add Industry --}}
            <div class="m-form m-form--label-align-right  m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-12 order-2 order-xl-1">
                        {{-- <form class="m-form m-form--fit m-form--label-align-right" method='post' action="{{ route('admin.cvbank.filter') }}"> --}}
                            {{-- @csrf --}}
                            <div class="form-group m-form__group">
                                <label>
                                    Find Candidates
                                </label>
                                <div class="input-group">
                                    {{-- Active/block --}}
                                    <select name="status" class="form-control m-bootstrap-select m_selectpicker" id="status" >
                                        <option value="321" {{ ($status_selected == 321) ? 'selected' : ''}}>All</option>
                                        <option value="1" {{ ($status_selected == 1) ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{ ($status_selected == 0) ? 'selected' : ''}}>Blocked</option>
                                    </select>
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
                                    <select name="institute" class="form-control m-bootstrap-select m_selectpicker" id="institute" data-size="10" data-live-search="true">
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
                                    {{-- <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            Search
                                        </button>
                                    </div> --}}
                                </div>
                            </div>
                        {{-- </form> --}}
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
                            City
                        </th>
                        <th title="Field #5">
                            Country
                        </th>
                        <th title="Field #6">
                            Applied Jobs
                        </th>
                        <th title="Field #7">
                            CV
                        </th>
                        <th title="Field #8">
                            Stauts
                        </th>
                        <th title="Field #9">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php
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
                            {{ $cv->city }}
                        </td>
                        <td>
                            {{ $cv->country }}
                        </td>
                        <td>
                            <span class="m-nav__link-badge">
                                <span class="m-badge m-badge--success m-badge--wide">
                                    {{ $cv->appliedJob->count() }}
                                </span>
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('public.candidate.profile', $cv->id) }}" target="_blank" class="btn btn-outline-success m-btn m-btn--icon m-btn--pill m-btn--air">
                                <span>
                                    <i class="la la-file-pdf-o"></i>
                                    <span>
                                        CV
                                    </span>
                                </span>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.candidate.status', $cv->id) }}" class="btn {{ ($cv->verified) ? 'btn-outline-success' : 'btn-outline-danger' }}  m-btn m-btn--icon m-btn--pill m-btn--air">
                                <span>
                                    <i class="la la-{{ ($cv->verified) ? 'check-circle' : 'times-circle-o' }}"></i>
                                    <span>
                                        {{ ($cv->verified) ? 'Active' : 'Blocked' }}
                                    </span>
                                </span>
                            </a>
                        </td>
                        <td>
                            <span style="overflow: visible; position: relative; width: 110px;">
                                <a href="{{ route('admin.candidate.edit', $cv->id) }}" target="_blank" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                    <i class="la la-edit"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                    @endforeach --}}
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
function runDataTable(){
    var status = $('#status').val();
    var skill = $('#skill').val();
    var experience = $('#experience').val();
    var institute = $('#institute').val();
    var job_level = $('#job_level').val();
    var designation = $('#designation').val();
    var category = $('#category').val();


    var table = $('#html_table').DataTable( {
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('admin.candidate.datatable') }}',
            data: {
                    status: status,
                    skill: skill,
                    experience: experience,
                    institute: institute,
                    job_level: job_level,
                    designation: designation,
                    category: category,
                }
            },
        // deferRender: true,
        columns: [
            { data: 'id' },
            {
                "data": null ,
                "render" : function ( data, type, candidate ) {
                                var img = (candidate['dp']) ? candidate['dp']: "default_user.png";
                                return '<img src="{{ asset('storage/uploads/')}}/'+img+'" alt="photo" class="rounded" width="50">'+' '+candidate['fname']+' '+candidate['lname'];
                            }
            },
            { data: 'email', name: 'email' },
            { data: 'city', name: 'city' },
            { data: 'country', name: 'country' },
            {
                "data": null ,
                "render" : function ( data, type, candidate ) {
                        // return candidate['applied'];
                        return '<span class="m-nav__link-badge"><span class="m-badge m-badge--success m-badge--wide">'+candidate['applied']+'</span></span>';

                            }
            },
            {
                "data": null,
                "render": (data, type, candidate) => {
                    var id = candidate['id'];
                    var route = '{{ url("/public/candidate/profile/") }}/'+id;
                    return '<a href="'+route+'" target="_blank" class="btn btn-outline-success m-btn m-btn--icon m-btn--pill m-btn--air"><span><i class="la la-file-pdf-o"></i><span>CV</span></span></a>';
                }
            },
            {
                "data": null,
                "render": (data, type, candidate) => {
                    var id = candidate['id'];
                    var btn_class = (candidate['verified']) ? 'btn-outline-success' : 'btn-outline-danger';
                    var icon_class = (candidate['verified']) ? 'check-circle' : 'times-circle-o';
                    var text = (candidate['verified']) ? 'Active': 'Blocked';
                    return '<a href="{{ url('/admin/candidate/status/') }}/'+id+'" class="btn '+btn_class+' m-btn m-btn--icon m-btn--pill m-btn--air"><span><i class="la la-'+icon_class+'"></i><span>'+text+'</span></span></a>';
                }
            },
            {
                "data": null,
                "render": (data, type, candidate) => {
                    var id = candidate['id'];
                    return '<span style="overflow: visible; position: relative; width: 110px;"><a href="{{ url('/admin/candidate/edit/')}}/'+id+'" target="_blank" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i></a></span>';
                }
            }
        ],
        columnDefs: [
            {
                targets: 1,
                className: 'mdl-data-table__cell--non-numeric text-left'
            },
            {
                targets: [ 0, 2, 3, 4, 5],
                className: 'mdl-data-table__cell--non-numeric text-center'
            }
        ],
        responsive: true,
        destroy: true,
        fixedColumns: true
    });
};

runDataTable();


$('#status, #skill, #experience, #institute, #job_level, #designation, #category').on('change', function(){
    runDataTable();
});

</script>

<script>
    var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
</script>


@endpush