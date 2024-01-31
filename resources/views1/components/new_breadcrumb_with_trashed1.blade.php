@section('page-header')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item text-uppercase fw-bold"><a href="javascript: void(0);">{{$title}}</a></li>
                        <li class="breadcrumb-item active text-uppercase">{{$subtitle}}</li>
                    </ol>
                </div>
             <div class="between-center">
                <a href="#" class="btn btn-info btn-sm text-uppercase mx-1"><i class=""></i> Company groupe</a>
                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm text-uppercase mx-1"><i class=""></i> transport Company</a>

                @can($permission)
                <a href="{{$route}}" class="btn btn-success btn-sm text-uppercase"><i class="{{$icon}}"></i> {{$text}}</a>
                @endcan
                @can($permission)
                <a href="{{$routeTrashed}}" class="btn btn-danger btn-sm text-uppercase mx-1"><i class="{{$iconTrashed}}"></i> {{$textTrashed}}</a>
                @endcan
             </div>
            </div>
        </div>
    </div>
@endsection
<!-- end page title -->
