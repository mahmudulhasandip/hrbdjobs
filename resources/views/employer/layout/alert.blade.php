


@if (session('status'))
    @push('js')

    <script>
        toastr.success('{{ session('status') }}');
    </script>

    @endpush
@endif

@if (session('error'))
    @push('js')

    <script>
        toastr.error('{{ session('error') }}');
    </script>

    @endpush
@endif

{{-- validation --}}
@if (session('errors'))

    @foreach ($errors->all() as $message) 
        @push('js')

        <script>
            var message = "{{ $message }}";
            toastr.error(message);
        </script>

        @endpush
    @endforeach
    
    
@endif