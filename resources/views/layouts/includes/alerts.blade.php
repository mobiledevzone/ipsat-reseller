 <script>
@if ( session('failed'))
    iziToast.error({
        title: '{{ __('Error!') }}',
        message: "{{ session('failed') }}",
        position: 'topRight'
    });
@endif

@if ( session('errors'))
    iziToast.error({
        title: '{{ __('Error!') }}',
        message: "{{ session('errors') }}",
        position: 'topRight'
    });
@endif

@if ( session('successful'))
    iziToast.success({
        title: '{{ __('Success') }}',
        message: '{{ session("successful") }}',
        position: 'topRight'
    });
@endif

@if ( session('success'))
    iziToast.success({
        title: '{{ __('Success') }}',
        message: '{{ session("success") }}',
        position: 'topRight'
    });
@endif
@if ( session('warning'))
    iziToast.warning({
        title: '{{ __('Ohh!') }}',
        message: '{{ session("warning") }}',
        position: 'topRight'
    });
@endif
</script>
<script>
@if (session('status'))
    iziToast.info({
    title: '{{ __('Information') }}',
    message: '{{ session("status") }}',
    position: 'topRight'
  });
@endif
</script>


