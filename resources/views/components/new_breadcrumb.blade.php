@section('page-header')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item text-uppercase fw-bold"><a
                                href="javascript: void(0);">{{ $title }}</a></li>
                        <li class="breadcrumb-item active text-uppercase">{{ $subtitle }}</li>
                    </ol>
                </div>
                <div class="between-center">
                    @can($permission)
                        <a href="{{ $route }}" class="btn btn-success btn-sm text-uppercase"><i
                                class="{{ $icon }}"></i> {{ $text }}</a>
                    @endcan
                    @can($permission)
                        @if (isset($subtitleSeconde))
                            <a href="{{ isset($routeSeconde) ? $routeSeconde : '#' }}"
                                class="btn btn-primary btn-sm text-uppercase mx-1"><i class="{{ $icon }}"></i>
                                {{ isset($subtitleSeconde) ? $subtitleSeconde : 'update' }}</a>
                        @endif
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- end page title -->
