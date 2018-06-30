@extends('admin.layout.admin') @section('content') @include('admin.layout.partialLayouts.alert')
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

            <table class="m-datatable" id="html_table" width="100%">
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
@endsection 

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/css/iziToast.min.css" />
@endpush



@push('js')

<!--begin::Page Resources -->
<script src="/js/datatables/employerListTable.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/js/iziToast.min.js"></script>

<script>
    // delete employer
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
</script>
<!--end::Page Resources -->





@endpush