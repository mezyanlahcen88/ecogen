<div class="card-header d-flex justify-content-between">
    <h5 class="card-title mb-0">{{$card_header_text}}</h5>
  @can($add_permission)
  <a class="btn btn-success add-btn" id="create-btn" href="{{route($name_route)}}"><i class="ri-add-line align-bottom me-1"></i> {{ $add_text }}</a>
  @endcan
</div>
