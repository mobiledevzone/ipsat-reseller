@if ($requestdomain->is_approved == 0)
    <div class="dropdown d-inline">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            {{ __('Action') }}
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('requestdomain.edit', $requestdomain->id) }}">
                <i class="fa fa-edit"></i> {{ __('Edit') }}
            </a>

            <a class="dropdown-item text-success"
                href="{{ route('approverequestdomain.status', $requestdomain->id) }}">
                <i class="fas fa-check-double"></i> {{ __('Approved') }}</a>

            <a class="dropdown-item text-danger reason"
                data-action="/request-domain/disapprove/{{ $requestdomain->id }}" href="javascript:void(0)">
                <i class="  fa fa-ban"></i> {{ __('Disapprove') }}</a>

            <a href="#" class="dropdown-item  text-danger" data-toggle="tooltip"
                data-original-title="{{ __('Delete') }}"
                onclick="confirm('{{ __('Are You sure ?') }}')?document.getElementById('delete-form-{{ $requestdomain->id }}').submit():'';"><i
                    class="fas fa-trash"></i> {{ __('Delete') }}</a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['requestdomain.destroy', $requestdomain->id], 'id' => 'delete-form-' . $requestdomain->id]) !!}
            {!! Form::close() !!}

        </div>
    </div>
@endif
