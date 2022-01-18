<div class="dropdown d-inline">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('modules.edit', $module->id) }}">
            <i class="fa fa-edit"></i> {{ __('Edit') }}
        </a>
    <a href="#" class="dropdown-item  text-danger" data-toggle="tooltip"
        data-original-title="{{ __('Delete') }}"
        onclick="confirm('{{ __('Are You sure ?') }}')?document.getElementById('delete-form-{{ $module->id }}').submit():'';"><i
            class="fas fa-trash"></i> {{ __('Delete') }}</a>
    {!! Form::open(['method' => 'DELETE', 'route' => ['modules.destroy', $module->id], 'id' => 'delete-form-' . $module->id]) !!}
    {!! Form::close() !!}
    </div>
</div>
