<div class="card-body border-bottom-dashed border-bottom">
    <form action="{{route($name_route)}}"  method="GET" >
        <div class="row g-3">
            <div class="col-xl-2">
                <div>
                    <select class="form-control w-50" data-plugin="choices" data-choices data-choices-search-false name="paginator"
                         id="paginatorKeyword">
                         @foreach ($paginations as $pagination)
                         <option value="{{$pagination}}" {{ $paginator == $pagination || request()->paginator == $pagination ? 'selected' : '' }}>{{$pagination}}</option>
                         @endforeach
                    </select>
                </div>
            </div>
            <!--end col-->
            <div class="col-xl-8">
                <div class="input-group">
                       <input type="text" class="form-control"
                        placeholder="{{ trans('translation.general_general_keyword') }}" name="search" value="{{ request()->search }}">
                    <button class="btn btn-primary"><i class="ri-search-2-line"></i></button>
                </div>
            </div>
            <!--end col-->

            <div class="col-xl-2">
                <div>
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="offcanvas"
                        href="#offcanvasExample"><i class="ri-equalizer-fill me-2 align-bottom"></i>Fliters
                    </button>
                </div>

            </div>
            <!--end col-->

        </div>
        <!--end row-->
    </form>
</div>
