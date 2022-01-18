<div class="dropdown d-inline">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="plans/{{ $plan->id }}/edit" id="edit-user"
            data-action="plans/{{ $plan->id }}/edit"><i class="fa fa-edit"></i> {{ __('Edit') }}</a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item  text-danger" data-toggle="tooltip" data-original-title="{{ __('Delete') }}"
            onclick="confirm('{{ __('Are You sure ?') }}')?document.getElementById('delete-form-{{ $plan->id }}').submit():'';"><i
                class="fas fa-trash"></i> {{ __('Delete') }}</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['plans.destroy', $plan->id], 'id' => 'delete-form-' . $plan->id]) !!}
        {!! Form::close() !!}
    </div>
</div>
