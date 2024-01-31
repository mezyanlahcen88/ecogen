@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.commands_form_manage_commands') }} |
    {{ trans('translation.commands_action_show') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.commands_form_manage_commands'),
        'subtitle' => trans('translation.commands_action_show'),
        'route' => route('commands.index'),
        'text' => trans('translation.commands_form_commands_list'),
        'permission' => 'commands-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center gy-3">
                        <div class="col-sm">
                            <h5 class="card-title mb-0">{{ trans('translation.commands_action_show') }}</h5>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex gap-1 flex-wrap">
                                <a href="{{route('commands.generatePdf',$object->id)}}" class="btn btn-primary">Imprimer commande TTC</a>
                                <a href="{{route('commands.generatePdf',$object->id)}}" class="btn btn-success">Imprimer commande</a>
                                <a href="#" class="btn btn-warning"> Transfer bon ommand</a>
                                <a href="#" id="command_edit" class="getCommand" data-command-id="{{ $object->id }}" title="Edit"><span
                                    class="btn btn-info">{{ trans('translation.commands_action_edit') }}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 for="">Cette commande est <span class="text-warning">
                                            {{ $object->status }}</span></h3>
                                </div>
                                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="content">Les informations du client &nbsp;
                                            <span class="text-secondary">*</span></label>
                                        <table>
                                            <tr>
                                                <th>Designation </th>
                                                <td> : {{ $object->client->name_fr }} | {{ $object->client->name_ar }}</td>
                                            </tr>
                                            <tr>
                                                <th>ICE </th>
                                                <td> : {{ $object->client->ice }}</td>
                                            </tr>
                                            <tr>
                                                <th>EMAIL </th>
                                                <td> : {{ $object->client->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>TELEPHONE </th>
                                                <td> : {{ $object->client->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th>FAX </th>
                                                <td> : {{ $object->client->fax }}</td>
                                            </tr>
                                            <tr>
                                                <th>ADRESSE </th>
                                                <td> : {{ $object->client->address }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <label class="form-label my-1">Date de crétation</label>
                                        <input type="text" class="form-control" value="{{ $object->status_date }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="content">{{ trans('translation.commands_form_comment') }} &nbsp;
                                            <span class="text-secondary">*</span></label>
                                        <textarea class="form-control" name="comment" id="comment" rows="5" readonly>{{ $object->comment }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div
                                class="bg-info text-light h-25 w-100 d-flex  justify-content-between align-items-center px-4 mb-1">
                                <label for="" id="commands">Commande N° :</label>
                                <label for="" id="num_commands" >{{ $object->command_code }}</label>
                            </div>
                            <div
                                class="bg-primary text-light h-25 w-100 d-flex  justify-content-between align-items-center px-4 mb-1">
                                <label for="">Total TTC :</label>
                                <label for="" id="total_ttc" >{{ $object->TTTC }}</label>
                            </div>
                            <div
                                class="bg-success text-light h-25 w-100 d-flex  justify-content-between align-items-center px-4 mb-1">
                                <label for="">Total HT :</label>
                                <label for="" id="total_ht" >{{ $object->HT }}</label>
                            </div>
                            <div
                                class="bg-warning text-light h-25 w-100 d-flex  justify-content-between align-items-center px-4 mb-1">
                                <label for="">Total TVA :</label>
                                <label for="" id="total_ttva" >{{ $object->TVA }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h6 class="card-title mb-0 text-white">Détails de la commande</h6>
                </div>
                <div class="card-body">
                    @include('commands.show_table')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('layouts.includes.form_js')
@endsection
