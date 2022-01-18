@extends('layouts.main')
@section('title', __('All permission'))

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('All Permissions') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a></div>
                    <div class="breadcrumb-item">{{ __('All Permissions') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="card p-4">
                            <form class="form-horizontal" method="POST" action="{{ route('roles_permit', $role->id) }}">
                                @csrf

                                <div class="card-body">
                                    <table class="table table-flush permission-table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="200px">{{ __('Module') }}</th>
                                                <th>{{ __('Permissions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allmodules as $row)
                                                <tr>
                                                    <td> {{ __(ucfirst($row)) }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <?php   $default_permissions = [ __('manage'), __('create'), __('edit'), __('delete'), __('view'),__('impersonate')]; ?>
                                                            @foreach ($default_permissions as $permission)
                                                                @if (in_array($permission . '-' . $row, $allpermissions))
                                                                    @php($key = array_search($permission . '-' . $row, $allpermissions))
                                                                    <div class="col-3 custom-control custom-checkbox">
                                                                        {{ Form::checkbox('permissions[]', $key, in_array($permission . '-' . $row, $permissions), ['class' => 'custom-control-input', 'id' => 'permission_' . $key]) }}
                                                                        {{ Form::label('permission_' . $key, ucfirst($permission), ['class' => 'custom-control-label']) }}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <?php $modules = []; ?>
                                            @foreach ($modules as $module)
                                                <?php $s_name = $module; ?>
                                                <tr>
                                                    <td>
                                                        {{ __(ucfirst($module)) }}
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            @if (in_array('manage-' . $s_name, $allpermissions))
                                                                @php($key = array_search('manage-' . $s_name, $allpermissions))
                                                                <div class="col-3 custom-control custom-checkbox">
                                                                    {{ Form::checkbox('permissions[]', $key, in_array($key, $permissions), ['class' => 'custom-control-input', 'id' => 'permission_' . $key]) }}
                                                                    {{ Form::label('permission_' . $key, 'Manage', ['class' => 'custom-control-label']) }}
                                                                </div>
                                                            @endif
                                                            @if (in_array('create-' . $module, $allpermissions))
                                                                @php($key = array_search('create-' . $module, $allpermissions))
                                                                <div class="col-3 custom-control custom-checkbox">
                                                                    {{ Form::checkbox('permissions[]', $key, in_array($key, $permissions), ['class' => 'custom-control-input', 'id' => 'permission_' . $key]) }}
                                                                    {{ Form::label('permission_' . $key, __('Create'), ['class' => 'custom-control-label']) }}
                                                                </div>
                                                            @endif
                                                            @if (in_array('edit-' . $module, $allpermissions))
                                                                @php($key = array_search('edit-' . $module, $allpermissions))
                                                                <div class="col-3 custom-control custom-checkbox">
                                                                    {{ Form::checkbox('permissions[]', $key, in_array($key, $permissions), ['class' => 'custom-control-input', 'id' => 'permission_' . $key]) }}
                                                                    {{ Form::label('permission_' . $key, __('Edit'), ['class' => 'custom-control-label']) }}
                                                                </div>
                                                            @endif
                                                            @if (in_array('delete-' . $module, $allpermissions))
                                                                @php($key = array_search('delete-' . $module, $allpermissions))
                                                                <div class="col-3 custom-control custom-checkbox">
                                                                    {{ Form::checkbox('permissions[]', $key, in_array($key, $permissions), ['class' => 'custom-control-input', 'id' => 'permission_' . $key]) }}
                                                                    {{ Form::label('permission_' . $key, __('Delete'), ['class' => 'custom-control-label']) }}
                                                                </div>
                                                            @endif
                                                            @if (in_array('view-' . $module, $allpermissions))
                                                                @php($key = array_search('view-' . $module, $allpermissions))
                                                                <div class="col-3 custom-control custom-checkbox">
                                                                    {{ Form::checkbox('permissions[]', $key, in_array($key, $permissions), ['class' => 'custom-control-input', 'id' => 'permission_' . $key]) }}
                                                                    {{ Form::label('permission_' . $key, __('View'), ['class' => 'custom-control-label']) }}
                                                                </div>
                                                            @endif
                                                            @if (in_array('impersonate-' . $module, $allpermissions))
                                                                @php($key = array_search('impersonate-' . $module, $allpermissions))
                                                                <div class="col-3 custom-control custom-checkbox">
                                                                    {{ Form::checkbox('permissions[]', $key, in_array($key, $permissions), ['class' => 'custom-control-input', 'id' => 'permission_' . $key]) }}
                                                                    {{ Form::label('permission_' . $key, __('Impersonate'), ['class' => 'custom-control-label']) }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    <div class="col-sm-12 mx-auto">
                                        <a href="{{ route('roles.index') }}"
                                            class="btn btn-secondary">{{ __('Cancel') }}</a>
                                        <button type="submit" class="btn btn-primary ">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
