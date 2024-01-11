<div class="card-body border-bottom-dashed border-bottom">
    <form action="{{route($name_route)}}"  method="GET" id="searchFormKeyword">
        <div class="row g-3 justify-content-between">
            <div class="col-xl-2">
                <div>
                    <select class="form-select form-select-sm w-50" name="paginator"
                         id="idStatus">
                         @foreach ($paginations as $pagination)
                         <option value="{{$pagination}}" {{$paginator == $pagination ? 'selected' : ''}}>{{$pagination}}</option>
                         @endforeach
                    </select>
                </div>
            </div>
            <!--end col-->
            <div class="col-xl-4">
                <div class="search-box d-flex">
                       <input type="text" class="form-control"
                        placeholder="{{ trans('translation.general_general_keyword') }}" name="search" value="{{ old('search') }}">
                    <button class="btn btn-primary"><i class="ri-search-2-line"></i></button>
                </div>
            </div>
            <!--end col-->



        </div>
        <!--end row-->
    </form>
</div>
