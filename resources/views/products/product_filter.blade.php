<div class="card-body border">
    <form>
        <div class="row g-3">
            {{-- <div class="col-xxl-4 col-sm-6">
                <div class="search-box">
                    <input type="text" class="form-control search"
                        placeholder="Search for order ID, customer, order status or something...">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div> --}}
            <div class="col-lg-3">
                <div class="mt-0">
                    <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d/m/Y" data-range-date="true" placeholder="{{Carbon\Carbon::now()->format('d/m/Y')}}">
                </div>
            </div>
            <!--end col-->
            <div class="col-xxl-3 col-sm-4">
                <div>
                    <select class="js-example-basic-single" name="user" id="user">
                        <option value="">Chosir Famille</option>
                        {{-- @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach --}}
                    </select>
                </div>
            </div>
            <!--end col-->
            <div class="col-xxl-3 col-sm-4">
                <div>
                    <select class="js-example-basic-single"  name="sfamille" id="sfamille">
                        <option value="">Chosir S-famille</option>
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                    </select>
                </div>
            </div>
            <!--end col-->
            <div class="col-xxl-3 col-sm-4">
                <div>
                    <select class="js-example-basic-single"  name="archive" id="archive">
                        <option value="">Chosir Archive</option>
                        <option value="1">Archive</option>
                        <option value="0">Inarchive</option>
                    </select>
                </div>
            </div>
            {{-- <div class="col-xxl-3 col-sm-4">
                <div>
                    <button type="button" class="btn btn-primary w-100" onclick="reload_table();"> <i
                            class="ri-equalizer-fill me-1 align-bottom"></i>

                    </button>
                </div>
            </div> --}}
            <!--end col-->

        </div>
        <!--end row-->
    </form>
</div>
