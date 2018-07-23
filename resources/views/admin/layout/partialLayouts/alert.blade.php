


@if (session('status'))
    @push('js')

    <script>
        toastr.success('{{ session('status') }}');
    </script>

    @endpush

@elseif (session('error'))
    @push('js')

    <script>
        toastr.error('{{ session('error') }}');
    </script>

    @endpush
@endif