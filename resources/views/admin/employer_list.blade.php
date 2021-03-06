@extends('admin.layout.admin')

@section('content')

{{-- @include('admin.layout.partialLayouts.alert') --}}
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Employer List
            </h3>
        </div>

    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">
    <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
        <div class="m-alert__icon">
            <i class="flaticon-exclamation m--font-brand"></i>
        </div>
        <div class="m-alert__text">
            There will be a short instruction about Employer List's operation
        </div>
    </div>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Employer List Table
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">


            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label>
                                            Status:
                                        </label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select m_selectpicker" id="m_form_status">
                                            <option value="">
                                                All
                                            </option>
                                            <option value="pending">
                                                Pending
                                            </option>
                                            <option value="approved">
                                                Approved
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>

                            {{-- <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="la la-search"></i>
                                        </span>
                                    </span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->

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
                            User Name
                        </th>
                        <th title="Field #4">
                            Email
                        </th>
                        <th title="Field #5">
                            Designation
                        </th>
                        <th title="Field #6">
                            Address
                        </th>
                        <th title="Field #7">
                            City
                        </th>
                        <th title="Field #8">
                            Country
                        </th>
                        <th title="Field #9">
                            Website
                        </th>
                        <th title="Field #10">
                            Status
                        </th>
                        <th title="Field #11">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $id = 0;
                    @endphp
                    @foreach($employers as $employer)
                    @php
                        $id++;
                    @endphp
                    <tr>

                        <td>
                            {{ $id }}
                        </td>
                        <td>
                            {{ $employer->fname }} {{ $employer->lname }}
                        </td>
                        <td>
                            {{ $employer->username }}
                        </td>
                        <td>
                            {{ $employer->email }}
                        </td>
                        <td>
                            {{ $employer->designation }}
                        </td>
                        <td>
                            {{ $employer->address }}
                        </td>
                        <td>
                            {{ $employer->city }}
                        </td>
                        <td>
                            {{ $employer->country }}
                        </td>
                        <td>
                            {{ $employer->website }}
                        </td>
                        <td>
                            <a href="{{ route('admin.employer.approve', $employer->id) }}" class="m-badge {{ ($employer->status) ? 'm-badge--success' : 'm-badge--danger' }} m-badge--wide text-white">{{ ($employer->status) ? 'Approved' : 'Pending' }}</a>
                        </td>
                        <td>
                            <a href="javascript: void(0);" data-toggle="modal" data-target="#employer_modal" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill employer_view" data-employerindex="{{ json_encode($employer) }}">
                                <i class="la la-eye"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                <i class="la la-ellipsis-h"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">
                                    <i class="la la-edit"></i> Edit Details
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.employer.delete', $employer->id) }}" id="deleteEmp">
                                    <i class="la la-trash"></i> Delete Employer
                                </a>
                                <form id="delete-form" action="{{ route('admin.employer.delete', $employer->id) }}" method="get">
                                    @csrf
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
</div>

<div class="modal fade" id="employer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Employer Info
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td style="font-weight: bold; width: 100px;">Name:</td>
                        <td id="empName"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 100px;">Username:</td>
                        <td id="empUsername"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 100px;">Email:</td>
                        <td id="empEmail"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 100px;">Designation:</td>
                        <td id="empDesignation"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 100px;">Address:</td>
                        <td id="empAddress"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 100px;">City:</td>
                        <td id="empCity"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 100px;">Country:</td>
                        <td id="empCountry"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 100px;">Website:</td>
                        <td id="empWebsite"></td>
                    </tr>
                </table>
            </div>

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

$('#html_table').DataTable( {
    columnDefs: [
        {
            targets: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            className: 'mdl-data-table__cell--non-numeric'
        }
    ],
    responsive: true,
    fixedColumns: true
});

$("#m_form_status").on('change', function(){
    $('#html_table').DataTable().search(this.value).draw();
})


</script>

<script>
    var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
</script>


<script type="text/javascript">



    $(document).ready(function() {

        $('#employer_modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('employerindex'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#empName').text(recipient.fname + " " + recipient.lname);
            modal.find('#empUsername').text(recipient.username);
            modal.find('#empEmail').text(recipient.email);
            modal.find('#empDesignation').text(recipient.designation);
            modal.find('#empAddress').text(recipient.address);
            modal.find('#empCity').text(recipient.city);
            modal.find('#empCountry').text(recipient.country);
            modal.find('#empWebsite').text(recipient.website);
        })
    });
</script>


{{-- <script>
    var DatatableHtmlTableDemo = {
    init: function () {
        var e;
        e = $(".m-datatable").mDatatable({
            data: {
                saveState: {
                    cookie: !1
                }
            },
            search: {
                input: $("#generalSearch")
            },

            }), $("#m_form_status").on("change", function () {
                e.search($(this).val().toLowerCase(), "Status")
            }), $("#m_form_status, #m_form_type").selectpicker()
        }
    };
    jQuery(document).ready(function () {
        DatatableHtmlTableDemo.init();
    });
</script> --}}

@endpush