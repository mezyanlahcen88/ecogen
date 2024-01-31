<div class="card-header align-items-center d-flex">
    <h4 class="card-title mb-0 flex-grow-1">{{$form_text}}</h4>
    <div class="flex-shrink-0">
            @foreach (languages() as $language)
            <a class="btn {{$lang == $language->locale ? ' btn-success ' : 'btn-primary '}}  my-2 mx-1"
            href="{{ route(Route::currentRouteName(), ['id' => $id, 'lang' => $language->locale]) }}">
            {{ $language->name}}
            </a>
            @endforeach
        <div class="form-check form-switch form-switch-right form-switch-md">
                        <a class="btn btn-primary" href="{{$name_route}}"><i class="las la-reply"></i></a>
        </div>
    </div>
</div><!-- end card header -->
