


@if (session('status'))
    @push('js')

    <script>
        toastr.success('{{ session('status') }}');
    </script>

    @endpush
@endif