
    {{-- <a class="btn btn-outline-primary mr-2" href="{{route('paymentterms.edit',$object->id)}}" >
        English
    </a> --}}


@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
{{-- @if ($properties['name'] == "English")
@continue
@endif --}}

    {{-- <a  class="btn btn-outline-primary mr-2" href="{{route(Route::currentRouteName(),['paymentterm'=>$id])}}"   data-toggle="tab"> --}}
    <a  class="btn btn-outline-primary mr-2" href="{{route('paymentterms.translate',['id'=>$object->id,'lang'=>$localeCode])}}">
        {{ $properties['name'] }}
        {{-- ,{{ $localeCode }} --}}
    </a>
{{-- <input type="hidden" value="{{ $localeCode }}" name="localeCode"> --}}

@endforeach


