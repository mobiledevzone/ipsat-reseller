<div class="dropdown d-inline">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="users/{{ $user->id }}/edit" id="edit-user"
            data-action="users/{{ $user->id }}/edit"><i class="fa fa-edit"></i> {{ __('Edit') }}</a>

        <a class="dropdown-item" target="_blank" href="users/{{ $user->id }}/impersonate" id="edit-user"
                data-action="users/{{ $user->id }}/impersonate"><i class="fa fa-user-secret"></i> {{ __('Impersonate') }}</a>

        <a href="#" class="dropdown-item  text-danger" data-toggle="tooltip" data-original-title="{{ __('Delete') }}"
            onclick="confirm('{{ __('Are You sure ?') }}')?document.getElementById('delete-form-{{ $user->id }}').submit():'';"><i
                class="fas fa-trash"></i> {{ __('Delete') }}</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'id' => 'delete-form-' . $user->id]) !!}
        {!! Form::close() !!}

    </div>
</div>
