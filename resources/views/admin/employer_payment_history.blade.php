@extends('admin.layout.admin') @section('content') @include('admin.layout.partialLayouts.alert')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Employer's payment List
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
            There will be a short instruction about Employer's payment operation
        </div>
    </div>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Employer's payment List Table
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
                            Package
                        </th>
                        <th title="Field #4">
                            Price
                        </th>
                        <th title="Field #5">
                            Discount
                        </th>
                        <th title="Field #6">
                            Transaction Type
                        </th>
                        <th title="Field #7">
                            TXID
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $id = 0;
                    @endphp
                    @foreach($payments as $payment)
                    @php 
                        $id++;
                    @endphp
                    <tr>
                        
                        <td>
                            {{ $id }}
                        </td>
                        <td>
                            {{ $payment->employer->fname }} {{ $payment->employer->lname }}
                        </td>
                        <td >
                            {{( $payment->job_package_id ) ?  $payment->jobPackage['name']  : $payment->featuredPackage['name'] }}
                        </td>
                        <td>
                            {{ $payment->price }}
                        </td>
                        <td>
                            {{ $payment->discount }}
                        </td>
                        <td>
                            {{ $payment->transaction_type }}
                        </td>
                        <td>
                            {{ $payment->transaction_id }}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/js/iziToast.min.js"></script>



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
            columns: [{
                field: "TXID",
                title: "TXID",
                template: function (e) {
                    return '<span style="color: #8b91dd">' + e.TXID + "</span>"
                }
            }],
            
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