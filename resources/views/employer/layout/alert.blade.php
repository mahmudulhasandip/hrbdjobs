


@if (session('status'))
    @push('js')

    <script>
        // toastr.success('{{ session('status') }}');
        iziToast.success({
            title: 'Error',
            message: '{{ session('status') }}',
            timeout: 2500,
            overlay: true,
            position: 'topRight',
        });
    </script>

    @endpush
@endif

@if (session('error'))
    @push('js')

    <script>
        // toastr.error('{{ session('error') }}');
        iziToast.error({
            title: 'Error',
            message: '{{ session('error') }}',
            timeout: 3000,
            overlay: true,
            position: 'topRight',
        });
    </script>

    @endpush
@endif

{{-- validation --}}
@if (session('errors'))

    @foreach ($errors->all() as $message) 
        @push('js')

        <script>
            // var message = "{{ $message }}";
            // toastr.error(message);

            iziToast.error({
                title: 'Error',
                message: '{{ $message }}',
                timeout: 5000,
                overlay: true,
                position: 'topRight',
            });
        </script>

        @endpush
    @endforeach
    
    
@endif