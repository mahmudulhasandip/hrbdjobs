@extends('admin.layout.admin')
@section('content') {{--
    @include('admin.layout.partialLayouts.alert') --}}

<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Add Service Items
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
                        Service Items Table
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">


            {{-- Add Industry --}}
            <div class="m-form m-form--label-align-right  m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-12 order-2 order-xl-1">
                        <form class="m-form m-form--fit m-form--label-align-right" method='post' action="{{ route('admin.services_item.store') }}">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <select class="form-control m-input" id="exampleSelect1" name="service_package_id">
                                        <option>Select Service Type First</option>
                                        @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="m-form__help text-danger">
                                        Select a service type first.
                                    </span>
                                </div>
                                <div class="form-group m-form__group">
                                    <input type="text" class="form-control m-input" id="" aria-describedby="title" placeholder="Add services items title" name="title">
                                    {{-- <span class="m-form__help">
                                        Add Service Item Title
                                    </span> --}}
                                </div>
                                <div class="form-group m-form__group">
                                    <textarea class="form-control m-input" id="" rows="3" placeholder="Add services item details" name="details"></textarea>
                                </div>
                                <div class="form-group m-form__actions">
                                    <button type="submit" class="btn btn-primary">
                                        ADD
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Service Items List
                        </h3>
                    </div>
                </div>
            </div>
            <br>

            @foreach ($services as $service)
            <!--begin::Section-->
            <div class="m-accordion m-accordion--default" id="m_accordion_1" role="tablist">
                <!--begin::Item-->
                <div class="m-accordion__item">
                    <div class="m-accordion__item-head collapsed"  role="tab" id="m_accordion_1_item_1_head-{{ $service->id }}" data-toggle="collapse" href="#m_accordion_1_item_1_body-{{ $service->id }}" aria-expanded="    false">
                        <span class="m-accordion__item-icon">
                            <i class="fa flaticon-user-ok"></i>
                        </span>
                        <span class="m-accordion__item-title">
                            {{ $service->name }}
                        </span>
                        <span class="m-accordion__item-mode"></span>
                    </div>
                    <div class="m-accordion__item-body collapse" id="m_accordion_1_item_1_body-{{ $service->id }}" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_1_head-{{ $service->id }}" data-parent="#m_accordion_1">
                        <div class="m-accordion__item-content">

                            @foreach ($service->servicePackageItem as $item)
                                @if ($item)
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->title }}</h5>
                                            <p class="card-text">{{ $item->details }}</p>
                                            <a href="#" class="card-link" data-toggle="modal" data-target="#m_modal_4" data-service_item='{{ $item }}'>Edit</a>
                                            <a href="javascript: void(0);" class="card-link delete" data-id='{{ $item->id }}'>Delete</a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
                <!--end::Item-->
            </div>
            @endforeach
        </div>

        <!--begin::Modal-->
        <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            New message
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.services_item.update') }}">
                            @csrf
                            <input type="hidden" name="service_item_id" id="service_item_id">
                            <div class="form-group">
                                <label for="name" class="form-control-label">
                                    Service Title:
                                </label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group m-form__group">
                                <label for="details" class="form-control-label">
                                    Service Details:
                                </label>
                                <textarea class="form-control m-input" id="details" rows="3" name="details"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--end::Modal-->

    </div>
</div>
@endsection
 @push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"> {{--
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css"> --}}
@endpush @push('js') {{--
<script src="/admin/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script> --}}

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
{{--
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script> --}}



{{-- edit institute name --}}
<script>
    $(document).ready(function() {
        $('#m_modal_4').on('show.bs.modal', (event) => {
            var modal = $(this);
            var button = $(event.relatedTarget); // Button that triggered the modal
            var service_item = button.data('service_item'); // Extract info from data-* attributes
            modal.find('#service_item_id').val(service_item.id);
            modal.find('#title').val(service_item.title);
            modal.find('#details').val(service_item.details);
        })
    });

</script>

{{-- ajax Delete --}}
<script>
    jQuery(document).ready(function () {
        var base_url = '{{ url("/admin/") }}'

        $(document).on('click', '.delete', function(){
            var id = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: "You clicked the delete button!",
                icon: "success",
                confirmButtonText: "<span><i class='la la-bullhorn'></i><span>Yes Delete!</span></span>",
                confirmButtonClass: "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon",
                showCancelButton: !0,
                cancelButtonText: "<span><i class='la la-thumbs-down'></i><span>Cancel</span></span>",
                cancelButtonClass: "btn btn-secondary m-btn m-btn--pill m-btn--icon"
            }).then((result) => {
                if(result.value){
                    // delete institute
                    $.ajax({
                        url: base_url+'/service/item/delete/'+id,
                        headers: {'X-CSRF-TOKEN' : Laravel.csrfToken},
                        type: "GET",
                    }).done((data) => {

                        swal({
                            position: 'top-end',
                            type: 'success',
                            title: data,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $(this).closest('.card').delay(1500).fadeOut(1000, () => {
                            $(this).closest('.card').remove();
                        });

                    }).fail((jqXHR, ajaxOptions, thrownError, textStatus) => {
                        console.log(jqXHR);
                        console.log(ajaxOptions);
                        console.log(thrownError);
                        console.log(textStatus);
                        swal({
                            position: 'top-end',
                            type: 'error',
                            title: 'Server Error!'+textStatus,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    })

                }
            })
        });
    });

</script>































@endpush