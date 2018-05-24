
@extends('admin.layout.admin') 

@section('content')
@include('admin.layout.partialLayouts.alert')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Job Packages List
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
            There will be a short instruction about Job Packages's operation
        </div>
    </div>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Job Packages Table
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            

            {{-- Add Industry --}}
            <div class="m-form m-form--label-align-right  m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-12 order-2 order-xl-1">
                        <form class="m-form m-form--fit m-form--label-align-right" method='post' action="{{ route('admin.jobPackages.store') }}">
                            @csrf
                            <div class="form-group m-form__group">
                                <label>
                                    Add New Job Packages
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Package Namge" name="name" required>
                                    <input type="text" class="form-control" placeholder="Price" name="price" required>
                                    <input type="text" class="form-control" placeholder="Discount" name="discount">
                                    <input type="text" class="form-control" placeholder="Job Post" name="job_post" required>
                                    <input type="text" class="form-control" placeholder="Duration" name="duration" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            ADD
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="m-datatable" id="html_table" width="100%">
                <thead>

                    <tr>

                        <th>
                            ID
                        </th>
                        <th >
                            Name
                        </th>
                        <th >
                            Price (TK)
                        </th>
                        <th>
                            Discount (TK)
                        </th>
                        <th>
                            Job Post
                        </th>
                        <th >
                            Duration/Month(s)
                        </th>
                        <th title="Field #6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $id= 1;
                    @endphp

                    @foreach( $job_packages as $job_package )
                    <tr>
                        <td>
                            {{ $id++ }}
                        </td>
                        <td>
                            {{ $job_package->name }}
                        </td>
                        <td>
                            {{ $job_package->price }}
                        </td>
                        <td>
                            {{ $job_package->discount }}
                        </td>
                        <td>
                            {{ $job_package->job_post }}
                        </td>
                        <td>
                            {{ $job_package->duration }}
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
@push('js')

<!--begin::Page Resources -->
<script src="/admin/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>

<script>
    var box = $('.m-portlet__body');
    $('#add_industry').on('click', function (e) {
        e.preventDefault();
        box.toggleClass('d-none');

    });

    

</script>
<!--end::Page Resources -->



@endpush