@extends('layouts.base_layout')
@section('title')
{{env('APP_NAME')}} | {{ trans('translation.role_form_manage_roles') }} {{ trans('translation.role_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
@include('components.new_breadcrumb', [
    'title' => trans('translation.role_form_manage_roles'),
    'subtitle' => trans('translation.role_action_edit'),
    'route' => route('roles.index'),
    'text' => trans('translation.role_form_roles_list'),
    'permission'=>'role-list',
    'icon'=>'lab la-stack-exchange'

])
@endsection


@section('card_body')
    <div class="card-body">
        <div class="live-preview">
            <div class="row gy-4">
                <form action="  {{ route('roles.update',$role->id) }} " method="post" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                            <div class="form-group" autocomplete="false">
<label for="role"> {{ trans('translation.role_form_role') }} &nbsp; <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                    aria-describedby="helpId"
                                    placeholder=" {{ trans('translation.configuration.role_name_placeholder') }}"
                                    value="{{ old('name',$role->name) }}">
                            </div>
                            @error('name')
                                <p class="text-danger"><small>{{ $message }}</small></p>
                            @enderror
                        </div>


                    </div>
                    <div class="mt-3">
                        <label for=""> {{ trans('translation.role_form_permissions_list') }} &nbsp;<span
                                class="text-danger">*</span></label>

                    </div>
                    <div class="row">

                        @foreach ($groupes as $groupe)
                            <div class="col-md-3">
                                <div class="card border card-border-secondary">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0 text-secondary text-center">{{ $groupe->name }}</h6>
                                    </div>

                                    <div class="card-body">
                                        @forelse ($groupe->permissions as $permission)
                                        <div class="form-check form-check-secondary mb-3">
                                            <input class="form-check-input" type="checkbox"  name="permissions[]" value="{{$permission->id}}"
                                            {{in_array($permission->id , $rolePermissions) ? " checked" : ""}}>
                                            <label class="form-check-label">
                                                {{ $permission->libele }}
                                            </label>
                                        </div>

                                        @empty
                                            there is no permission yet
                                        @endforelse
                                    </div>
                                </div>
                            </div><!-- end col -->
                        @endforeach



                        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                            @error('permissions')
                                <p class="text-danger"><small>{{ $message }}</small></p>
                            @enderror
                        </div>

                    </div>




                    <button class="btn ripple btn-secondary mt-3"
type="submit">{{ trans('translation.general_general_save') }}</button>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('layouts.includes.form_js')
@endsection
