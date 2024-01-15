<div class="d-flex justify-content-between align-items-center  border-bottom border-bottom-success border-bottom-dashed mb-2">
    <div class="row gy-4">
        <div class="d-flex ">
    <h5>you are editing  <strong class="text-warning">{{ getLangName($lang) }}</strong>  version</h5>
        </div>
    </div>
<div class="language-btns">
    @foreach (languages() as $language)
    <a class="btn {{$lang == $language->locale ? ' btn-success ' : 'btn-primary '}}  my-2 mx-1"
    href="{{ route('settings.translate',['id' =>settings()['id'], 'lang' => 'en','tab'=>'general_settings']) }}">
    {{ $language->name}}
    </a>
    @endforeach
</div>
</div>
