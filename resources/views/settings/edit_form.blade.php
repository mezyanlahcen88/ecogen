<div class="card-body">
    <!-- apdate Alert -->
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-check-double-line label-icon"></i><strong>Success</strong> {{ $message }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="  {{ route('settings.update', 'update-system-settings') }} " method="post" autocomplete="off"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">


            @include('form.input', [
                'cols' => 'col-md-6',
                'column' => 'system_name',
                'model' => 'setting',
                'optional' => 'text-danger',
                'input_type' => 'text',
                'class_name' => '',
                'column_id' => 'system_name',
                'column_value' => getSettings()['system_name'] ?? null,
                'readonly' => 'false',
            ])
            @include('form.input', [
                'cols' => 'col-md-6',
                'column' => 'title',
                'model' => 'setting',
                'optional' => 'text-danger',
                'input_type' => 'text',
                'class_name' => '',
                'column_id' => 'title',
                'column_value' => getSettings()['title'] ?? null,
                'readonly' => 'false',
            ])
            @include('form.input', [
                'cols' => 'col-md-6',
                'column' => 'address',
                'model' => 'setting',
                'optional' => 'text-danger',
                'input_type' => 'text',
                'class_name' => '',
                'column_id' => 'address',
                'column_value' => getSettings()['address'] ?? null,
                'readonly' => 'false',
            ])
            @include('form.input', [
                'cols' => 'col-md-6',
                'column' => 'email',
                'model' => 'setting',
                'optional' => 'text-danger',
                'input_type' => 'text',
                'class_name' => '',
                'column_id' => 'email',
                'column_value' => getSettings()['email'] ?? null,
                'readonly' => 'false',
            ])
            @include('form.input', [
                'cols' => 'col-md-6',
                'column' => 'phone',
                'model' => 'setting',
                'optional' => 'text-danger',
                'input_type' => 'text',
                'class_name' => '',
                'column_id' => 'phone',
                'column_value' => getSettings()['phone'] ?? null,
                'readonly' => 'false',
            ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'copyrigth',
                            'model' => 'setting',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'copyrigth',
                            'column_value' => getSettings()['copyrigth'] ?? null,
                            'readonly' => 'false',
                        ])
            @include('form.input', [
                'cols' => 'col-md-6',
                'column' => 'picture',
                'model' => 'setting',
                'optional' => 'text-danger',
                'input_type' => 'file',
                'class_name' => '',
                'column_id' => 'picture',
                'column_value' => getSettings()['picture'] ?? null,
                'readonly' => 'false',
            ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'picture',
                            'model' => 'setting',
                            'optional' => 'text-danger',
                            'input_type' => 'file',
                            'class_name' => '',
                            'column_id' => 'picture',
                            'column_value' => getSettings()['picture'] ?? null,
                            'readonly' => 'false',
                        ])
        </div>





        <button class="btn ripple btn-primary mt-3"
            type="submit">{{ trans('translation.general_general_save') }}</button>
    </form>

</div>
