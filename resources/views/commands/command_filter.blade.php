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
                    <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d/m/Y" placeholder="Date début" name="start_date">
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-3">
                <div class="mt-0">
                    <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d/m/Y" placeholder="Date fin" name="fin_date">
                </div>
            </div>
            <!--end col-->
            <div class="col-xxl-3 col-sm-3">
                <div>
                    <select class="js-example-basic-single"  name="client" id="client">
                        <option value="">Chosir client</option>
                        @foreach ($clients as $client)
                        <option value="{{$client->id}}">{{$client->getDesignation()}}</option>

                        @endforeach
                    </select>
                </div>
            </div>
            <!--end col-->
            <div class="col-xxl-3 col-sm-3">
                <div>
                    <select class="js-example-basic-single"  name="status" id="status">
                        <option value="">Status</option>
                        @foreach (getDevisStatus() as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
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
