@extends('admin.layout.admin')

@section('content')

{{-- @include('admin.layout.partialLayouts.alert') --}}
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Employer's posted job List
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
            There will be a short instruction about Employer's posted job operation
        </div>
    </div>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Employer's posted job List Table
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
                                        <select class="form-control m-bootstrap-select" id="m_form_status">
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

                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="la la-search"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->

            <table class="m-datatable" id="scrolling_horizontal" width="100%">
                <thead>
                    <tr>
                        <th title="Field #1">
                            ID
                        </th>
                        <th title="Field #2">
                            Employer Name
                        </th>
                        <th title="Field #3">
                            Title
                        </th>
                        <th title="Field #4">
                            Job Category
                        </th>
                        <th title="Field #5">
                            Job Designation
                        </th>
                        <th title="Field #6">
                            Job Level
                        </th>
                        <th title="Field #7">
                            Experience
                        </th>
                        <th title="Field #8">
                            Featured?
                        </th>
                        <th title="Field #9">
                            Status
                        </th>
                        <th title="Field #10">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $id = 0;
                    @endphp
                    @foreach($jobs as $job)
                    @php
                        $id++;
                    @endphp
                    <tr>

                        <td>
                            {{ $id }}
                        </td>
                        <td>
                            {{ $job->employer->fname }} {{ $job->employer->lname }}
                        </td>
                        <td>
                            {{ $job->title }}
                        </td>
                        <td>
                            @if($job->jobCategory)
                            {{ $job->jobCategory->name }}
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            @if($job->jobDesignation)
                            {{ $job->jobDesignation->name }}
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            {{ $job->jobLevel->name }}
                        </td>
                        <td>
                            {{ $job->experience }}
                        </td>
                        <td>
                            {{ ($job->is_featured) ? 'Featured' : 'Not Featured' }}
                        </td>
                        <td>
                            <a href="{{ route('admin.job.post.approve', $job->id) }}" class="m-badge {{ ($job->is_verified) ? 'm-badge--success' : 'm-badge--danger' }} m-badge--wide text-white">{{ ($job->is_verified) ? 'Approved' : 'Pending' }}</a>
                        </td>
                        <td>
                            <a href="javascript: void(0);" data-toggle="modal" data-target="#job_modal" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill job_view" data-jobindex="{{ json_encode($job) }}">
                                <i class="la la-eye"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                <i class="la la-ellipsis-h"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">
                                    <i class="la la-edit"></i> Edit Details
                                </a>
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

<div class="modal fade" id="job_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/css/iziToast.min.css" />
@endpush



@push('js')

<!--begin::Page Resources -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/js/iziToast.min.js"></script>

<script type="text/javascript">
    // delete job
	// $('#deleteEmp').on('click', function(e){
	// 	e.preventDefault();
	// 	iziToast.show({
	// 	theme: 'dark',
	// 	icon: 'la la-trash-o',
	// 	title: 'Are you sure?',
	// 	message: '',
	// 	position: 'center',
	// 	progressBar: true,
	// 	overlay: true,
	// 	progressBarColor: '#e54545',
	// 	buttons: [
	// 		['<button>Delete</button>', function (instance, toast) {
	// 			$('#delete-form').submit();
	// 		}, true],
	// 		['<button>Close</button>', function (instance, toast) {
	// 			instance.hide({
	// 				transitionOut: 'fadeOutUp',
	// 				onClosing: function(instance, toast, closedBy){
	// 					console.info('closedBy: ' + closedBy);
	// 				}
	// 			}, toast, 'buttonName');
	// 		}]
	// 	],
	// 	});
    // });


    $(document).ready(function() {

        $('#job_modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('jobindex'); // Extract info from data-* attributes
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


<script>
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
</script>

@endpush