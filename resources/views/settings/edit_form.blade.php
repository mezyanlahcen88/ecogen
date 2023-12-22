
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Vertical nav Steps</h4>
        </div><!-- end card header -->
        <div class="card-body form-steps">
            <form class="vertical-navs-step">
                <div class="row gy-5">
                    <div class="col-lg-3">
                        <div class="nav flex-column custom-nav nav-pills" role="tablist" aria-orientation="vertical">
                            <button class="nav-link done" id="v-pills-bill-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bill-info" type="button" role="tab" aria-controls="v-pills-bill-info" aria-selected="true">
                                <span class="step-title me-2">
                                    <i class="ri-close-circle-fill step-icon me-2"></i> Etape 1
                                </span>
                                Informations de Societé
                            </button>
                            <button class="nav-link active" id="v-pills-bill-address-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bill-address" type="button" role="tab" aria-controls="v-pills-bill-address" aria-selected="false">
                                <span class="step-title me-2">
                                    <i class="ri-close-circle-fill step-icon me-2"></i> Etape 2
                                </span>
                                Réseau sociaux
                            </button>
                            <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-payment" type="button" role="tab" aria-controls="v-pills-payment" aria-selected="false">
                                <span class="step-title me-2">
                                    <i class="ri-close-circle-fill step-icon me-2"></i> Etape 3
                                </span>
                                Apparence
                            </button>
                            <button class="nav-link" id="v-pills-finish-tab" data-bs-toggle="pill" data-bs-target="#v-pills-finish" type="button" role="tab" aria-controls="v-pills-finish" aria-selected="false">
                                <span class="step-title me-2">
                                    <i class="ri-close-circle-fill step-icon me-2"></i> Etape 4
                                </span>
                                Finish
                            </button>
                        </div>
                        <!-- end nav -->
                    </div> <!-- end col-->
                    <div class="col-lg-9">
                        <div class="px-lg-4">
                            <div class="tab-content">
                              @include('settings.tabs.first_tab')
                                <!-- end tab pane -->
                                @include('settings.tabs.second_tab')

                                <!-- end tab pane -->
                                @include('settings.tabs.third_tab')

                                <!-- end tab pane -->
                                @include('settings.tabs.fourth_tab')

                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->
                        </div>
                    </div>
                    <!-- end col -->


                </div>
                <!-- end row -->
            </form>
        </div>
    </div>
    <!-- end -->
</div>

