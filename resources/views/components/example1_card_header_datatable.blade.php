<div class="card-header border-bottom-dashed">

    <div class="row g-4 align-items-center">
        <div class="col-sm">
            <div>
                <h4 class="card-title mb-0">{{$card_header_text}}</h4>
            </div>
        </div>
        <div class="col-sm-auto">
            <div>
@can($add_permission)
                <a class="btn btn-success add-btn" id="create-btn" href="{{route($name_route)}}"><i class="ri-add-line align-bottom me-1"></i>  {{ $add_text }}</a>
@endcan

            </div>
        </div>
    </div>
</div>
