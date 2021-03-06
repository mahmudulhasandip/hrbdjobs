@extends('admin.layout.admin')

@section('content')

{{-- @include('admin.layout.partialLayouts.alert') --}}

<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Manage Institution
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
                        Institution Table
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">


            {{-- Add Industry --}}
            <div class="m-form m-form--label-align-right  m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-12 order-2 order-xl-1">
                        <form class="m-form m-form--fit m-form--label-align-right" method='post' action="{{ route('admin.institution.store') }}">
                            @csrf
                            <div class="form-group m-form__group">
                                <label>
                                    Add New Institution
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Add New Institution" name="name">
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
            <table class="mdl-data-table table table-striped table-bordered" style="width:100%" id="html_table">
                <thead>

                    <tr>

                        <th title="Field #1">
                            ID
                        </th>
                        <th title="Field #2">
                            Name
                        </th>
                        <th title="Field #3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @php $id= 1;
                    @endphp @foreach( $institutes as $institute )
                    <tr>
                        <td>
                            {{ $id++ }}
                        </td>
                        <td>
                            {{ $institute->name }}
                        </td>
                        <td>
                            <span style="overflow: visible; position: relative; width: 110px;">
                                <a href="javascript: void(0);" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details" data-toggle="modal" data-target="#m_modal_4" data-institute='{{ $institute }}'>
                                    <i class="la la-edit"></i>
                                </a>
                                <a href="javascript: void(0);" data-id='{{ $institute->id }}' class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete">
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
                        <form method="POST" action="{{ route('admin.institution.update') }}">
                            @csrf
                            <input type="hidden" name="institute_id" id="institute_id">
                            <div class="form-group">
                                <label for="name" class="form-control-label">
                                    Institution name:
                                </label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Send message
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
{{--  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">  --}}
@endpush


@push('js')
{{-- <script src="/admin/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script> --}}

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
{{--  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>  --}}

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
            targets: [ 0, 1, 2 ],
            className: 'mdl-data-table__cell--non-numeric'
        }
    ],
    responsive: true
});

</script>

{{-- edit institute name --}}
<script>
    $(document).ready(function() {
        $('#m_modal_4').on('show.bs.modal', (event) => {
            var modal = $(this);
            var button = $(event.relatedTarget); // Button that triggered the modal
            var institute = button.data('institute'); // Extract info from data-* attributes
            modal.find('#name').val(institute.name);
            modal.find('#institute_id').val(institute.id);
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
                        url: base_url+'/institute/delete/'+id,
                        headers: {'X-CSRF-TOKEN' : Laravel.csrfToken},
                    }).done((data) => {

                        swal({
                            position: 'top-end',
                            type: 'success',
                            title: data,
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $(this).closest('tr').delay(1500).fadeOut(1000, () => {
                            $(this).closest('tr').remove();
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