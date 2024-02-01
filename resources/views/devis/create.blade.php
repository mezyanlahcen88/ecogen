@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.devis_form_manage_devis') }} | {{ trans('translation.devis_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.devis_form_manage_devis'),
        'subtitle' => trans('translation.devis_action_add'),
        'route' => route('devis.index'),
        'text' => trans('translation.devis_form_devis_list'),
        'permission' => 'devis-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection
@section('content')
    <form action="{{ route('devis.store') }}" method="post" id="devis_form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row ">
                            <div class="col-md-3">
                                <h5 class="card-title mb-0">{{ trans('translation.devis_action_add') }}</h5>
                            </div>
                            <div class="col-md-3">
                                    <button type="button" class="btn btn-info">
                                        {{ trans('translation.general_general_save') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    @include('form.singleSelect', [
                                        'cols' => 'col-md-12',
                                        'column' => 'client_id',
                                        'isReload' => false,
                                        'label' => 'devis_form_client_id',
                                        'optional' => 'text-danger',
                                        'divID' => 'client_id',
                                        'options' => $clients,
                                        'object' => false,
                                    ])
                                    @include('form.singleSelect', [
                                        'cols' => 'col-md-6 ',
                                        'column' => 'category_id',
                                        'isReload' => false,
                                        'label' => 'product_form_category_id',
                                        'optional' => 'text-danger',
                                        'divID' => 'category',
                                        'options' => $categories,
                                        'object' => false,
                                    ])
                                    @include('form.singleSelect', [
                                        'cols' => 'col-md-6 ',
                                        'column' => 'scategory_id',
                                        'isReload' => false,
                                        'label' => 'product_form_scategory_id',
                                        'optional' => 'text-danger',
                                        'divID' => 'scategory',
                                        'options' => [],
                                        'object' => false,
                                    ])
                                    @include('form.singleSelect', [
                                        'cols' => 'col-md-6 ',
                                        'column' => 'product_id',
                                        'isReload' => false,
                                        'label' => 'devis_form_product_id',
                                        'optional' => 'text-danger',
                                        'divID' => 'client_id',
                                        'options' => $products,
                                        'object' => false,
                                    ])
                                    @include('form.input', [
                                        'cols' => 'col-md-4',
                                        'column' => 'latest_price',
                                        'model' => 'product',
                                        'optional' => 'text-danger',
                                        'input_type' => 'text',
                                        'class_name' => '',
                                        'column_id' => 'latest_price',
                                        'column_value' => old('latest_price'),
                                        'readonly' => 'false',
                                    ])
                                    <div class="col-md-2 mt-4">
                                        <a href="#" id="" class="btn btn-primary text-light getProduct"><i
                                                class="las la-check"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    @include('form.singleSelect', [
                                        'cols' => 'col-md-6 ',
                                        'column' => 'status',
                                        'isReload' => false,
                                        'label' => 'devis_form_status',
                                        'optional' => 'text-danger',
                                        'divID' => 'statusDiv',
                                        'options' => $devis_status,
                                        'object' => false,
                                    ])
                                    <div class="col-md-6">
                                        <div>
                                            <label class="form-label my-1">Date de crétation</label>
                                            <input type="text" class="form-control" data-provider="flatpickr" data-enable-time
                                                data-date-format="Y-m-d"
                                                placeholder="{{ Carbon\Carbon::now()->format('d-m-Y H:i') }}" name="status_date">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="content">{{ trans('translation.devis_form_comment') }} &nbsp;
                                                <span class="text-secondary">*</span></label>
                                            <textarea class="form-control" name="comment" id="comment" rows="5">{{ old('comment') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div
                                    class="bg-info text-light h-25 w-100 d-flex  justify-content-between align-items-center px-4 mb-1">
                                    <label for="" id="devis">DEVIS N° :</label>
                                    <label for="" id="num_devis"
                                        >{{ getDevisNumerotation() . '/' . getExercice() }}</label>
                                </div>
                                <div
                                    class="bg-primary text-light h-25 w-100 d-flex  justify-content-between align-items-center px-4 mb-1">
                                    <label for="">Total TTC :</label>
                                    <label for="" id="total_ttc" >0.00</label>
                                </div>
                                <div
                                    class="bg-success text-light h-25 w-100 d-flex  justify-content-between align-items-center px-4 mb-1">
                                    <label for="">Total HT :</label>
                                    <label for="" id="total_ht" >0.00</label>
                                </div>
                                <div
                                    class="bg-warning text-light h-25 w-100 d-flex  justify-content-between align-items-center px-4 mb-1">
                                    <label for="">Total TVA :</label>
                                    <label for="" id="total_ttva" >0.00</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h6 class="card-title mb-0 text-white">Détails de devis</h6>
                    </div>
                    <div class="card-body">
                        @include('devis.create_table')
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="text-start">
                    <button type="submit" class="btn btn-primary storeDevis">{{ trans('translation.general_general_save') }}</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('js')
    @include('layouts.includes.form_js')
    <script src="{{ asset('assets/custom_js/validate_number.js') }}"></script>
    <script src="{{ asset('assets/custom_js/categories_scategories.js') }}"></script>
    <script src="{{ asset('assets/custom_js/get_last_price.js') }}"></script>
    <script src="{{ asset('assets/custom_js/getProduct.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreDevisRequest') !!}
@endsection
