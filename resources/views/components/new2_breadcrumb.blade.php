@section('page-header')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item text-uppercase fw-bold"><a
                                href="javascript: void(0);">{{ $title }}</a></li>
                        <li class="breadcrumb-item active text-uppercase">{{ $subtitle }}</li>
                    </ol>
                </div>
                @can($permission)
                    <div class="buttons">
                        <a href="{{ $route }}" class="btn btn-success btn-sm text-uppercase"><i
                                class="{{ $icon }}"></i> {{ $text }}</a>
                        <a class="btn btn-info  btn-sm text-uppercase mx-1" data-bs-toggle="offcanvas" href="#offcanvasExample"><i
                                class="ri-equalizer-fill me-2 align-bottom"></i> Advanced Search
                        </a>
                        @can($permission)
                        <a href="{{$routeTrashed}}" class="btn btn-danger btn-sm text-uppercase mx-1"><i class="{{$iconTrashed}}"></i> {{$textTrashed}}</a>
                        @endcan
                    </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
<!-- end page title -->
