<script>
    @if ($errors->any())
        @foreach ($errors->all() as $message)
            toastr.error('{{ $message }}','Validation Error');
        @endforeach
    @endif

    @if (Session::has('message'))

        var type = "{{ Session::get('alert-type', 'info') }}"

        switch(type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ", "Information");
                break;
            case 'success':
                toastr.success(" {{ Session::get('message') }} ", "Successfully");
                break;
            case 'worning':
                toastr.worning(" {{ Session::get('message') }} ", "Worning");
                break;
            case 'error':
                toastr.error(" {{ Session::get('message') }} ", "Error");
                break;
        }

    @endif

</script>
