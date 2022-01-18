<div class="dropdown d-inline">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('roles.show', $role->id) }}">
            <i class="fa fa-key"></i> {{ __('Add Permission') }}
        </a>
        <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}">
            <i class="fa fa-edit"></i> {{ __('Edit') }}
        </a>
        <a href="#" class="dropdown-item  text-danger" data-toggle="tooltip" data-original-title="{{ __('Delete') }}"
            onclick="confirm('{{ __('Are You sure ?') }}')?document.getElementById('delete-form-{{ $role->id }}').submit():'';"><i
                class="fas fa-trash"></i> {{ __('Delete') }}</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'id' => 'delete-form-' . $role->id]) !!}
        {!! Form::close() !!}

    </div>
</div>
