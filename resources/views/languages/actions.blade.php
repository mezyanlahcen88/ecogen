<div class="d-flex justify-content-center gap-2">
    @can('systemlanguage-translation')
            <a href="{{ route('systemLanguages.translations', $object->id) }}" title="Translations"><span class="badge  text-bg-info"><i class="las la-language"></i></span></a>

@endcan

</div>
