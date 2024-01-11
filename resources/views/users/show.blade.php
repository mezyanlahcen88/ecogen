@extends('layouts.user_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.user_form_manage_users') }},{{ trans('translation.user_action_show') }}
@stop
@section('css')
    <!-- swiper css -->
    <link rel="stylesheet" href="{{ 'assets/libs/swiper/swiper-bundle.min.css' }}">
@endsection
@section('content')

    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="{{ URL::asset(getUserPicture($object->picture)) }}" class="rounded-circle avatar-xl img-thumbnail" alt="picture_img" name="picture">
                </div>


            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">
                        <span class="text-capitalize">{{ $object->firstname }}</span>
                        <span class="text-uppercase">{{ $object->lastname }}</span>
                    </h3>
                    <p class="text-white-75">
                        <span class="text-capitalize">{{ '@' . $object->username }}</span>
                        ,
                        <span class="text-capitalize">{{ $object->profession }}</span>
                    </p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i
                                class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{ $object->adresse }}
                            {{ $object->city->name ?? null }} {{ $object->state->name ?? null }}
                            {{ $object->country->name ?? null }}</div>

                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex justify-content-between">
                    <div></div>
                    <div class="">

                        <a href="{{ route('users.edit', ['uuid'=>$object->uuid,'tab'=>'personal']) }}" class="btn btn-success"><i
                                class="ri-edit-box-line align-bottom"></i> {{ trans('translation.general_general_update') }}</a>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="personnel" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-4">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Info</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">
                                                            {{ trans('translation.user_form_full_name') }} :</th>
                                                        <td class="text-muted">{{ $object->firstname }}
                                                            {{ $object->lastname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">{{ trans('translation.user_form_phone') }} :
                                                        </th>
                                                        <td class="text-muted">{{ $object->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">{{ trans('translation.user_form_email') }} :
                                                        </th>
                                                        <td class="text-muted">{{ $object->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">{{ trans('translation.user_form_adresse') }}
                                                            :</th>
                                                        <td class="text-muted">{{ $object->adresse }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Joining Date</th>
                                                        <td class="text-muted">24 Nov 2021</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">{{ trans('translation.user_form_social_network') }}</h5>
                                        <div class="gap-2">
                                            @if ($object->facebook)
                                                <div class="m-3 d-flex  align-items-baseline">
                                                    <a href="javascript:void(0);" class="avatar-xs d-block"
                                                        style="margin-right: 10px ">
                                                        <span
                                                            class="avatar-title rounded-circle fs-16 bg-primary text-light ">
                                                            <i class="ri-facebook-fill"></i>
                                                        </span>
                                                    </a>
                                                    <h6 class="text-muted">{{ $object->facebook }}</h6>
                                                </div>
                                            @endif
                                            @if ($object->instagram)
                                                <div class="m-3 d-flex  align-items-baseline">
                                                    <a href="javascript:void(0);" class="avatar-xs d-block"
                                                        style="margin-right: 10px ">
                                                        <span
                                                            class="avatar-title rounded-circle fs-16 bg-danger text-light">
                                                            <i class=" ri-instagram-fill"></i>
                                                        </span>
                                                    </a>
                                                    <h6 class="text-muted">{{ $object->instagram }}</h6>
                                                </div>
                                            @endif
                                            @if ($object->tiktok)
                                                <div class="m-3 d-flex  align-items-baseline">
                                                    <a href="javascript:void(0);" class="avatar-xs d-block"
                                                        style="margin-right: 10px ">
                                                        <span class="avatar-title rounded-circle fs-16 bg-info text-light">
                                                            <i class="bx bxl-tiktok"></i>
                                                        </span>
                                                    </a>
                                                    <h6 class="text-muted">{{ $object->tiktok }}</h6>
                                                </div>
                                            @endif
                                            @if ($object->twitter)
                                                <div class="m-3 d-flex  align-items-baseline">
                                                    <a href="javascript:void(0);" class="avatar-xs d-block"
                                                        style="margin-right: 10px ">
                                                        <span class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                                            <i class="bx bxl-twitter"></i>
                                                        </span>
                                                    </a>
                                                    <h6 class="text-muted">{{ $object->twitter }}</h6>
                                                </div>
                                            @endif
                                            @if ($object->linkedin)
                                                <div class="m-3 d-flex  align-items-baseline">
                                                    <a href="javascript:void(0);" class="avatar-xs d-block"
                                                        style="margin-right: 10px ">
                                                        <span class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                                            <i class="bx bxl-linkedin-square"></i>
                                                        </span>
                                                    </a>
                                                    <h6 class="text-muted">{{ $object->linkedin }}</h6>
                                                </div>
                                            @endif
                                            @if ($object->linkedin)
                                                <div class="m-3 d-flex  align-items-baseline">
                                                    <a href="javascript:void(0);" class="avatar-xs d-block"
                                                        style="margin-right: 10px ">
                                                        <span class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                                            <i class="bx bxl-linkedin-square"></i>
                                                        </span>
                                                    </a>
                                                    <h6 class="text-muted">{{ $object->linkedin }}</h6>
                                                </div>
                                            @endif

                                            @if ($object->googleplus)
                                                <div class="m-3 d-flex  align-items-baseline">
                                                    <a href="javascript:void(0);" class="avatar-xs d-block"
                                                        style="margin-right: 10px ">
                                                        <span
                                                            class="avatar-title rounded-circle fs-16 bg-warning text-light">
                                                            <i class="bx bxl-google-plus-circle"></i>
                                                        </span>
                                                    </a>
                                                    <h6 class="text-muted">{{ $object->googleplus }}</h6>
                                                </div>
                                            @endif





                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">{{ trans('translation.user_form_biographie') }}</h5>
                                        <p>{{ $object->biographie }}</p>

                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div><!-- end card -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header align-items-center">

                                                <div class="flex-shrink-0 ms-auto">
                                                    <ul class="nav justify-content-start nav-tabs-custom rounded card-header-tabs border-bottom-0"
                                                        role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-bs-toggle="tab"
                                                                href="#user_personnel_information" role="tab">
                                                                {{ trans('translation.user_form_personnel_information') }}
                                                            </a>
                                                        </li>

                                                        {{-- <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#user_social_network" role="tab">
                                                                {{ trans('translation.user_form_social_network') }}
                                                            </a>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content text-muted">
                                                    <div class="tab-pane active" id="user_personnel_information"
                                                        role="tabpanel">

                                                        {{-- start row  firstname and lastname --}}
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 mb-1">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5"
                                                                        for="firstname">{{ trans('translation.user_form_firstname') }}</label>
                                                                    <div class="">
                                                                        <span
                                                                            class="tx-medium">{{ $object->firstname }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 mb-1">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5"
                                                                        for="lastname">{{ trans('translation.user_form_lastname') }}</label>
                                                                    <div class="">
                                                                        <span
                                                                            class="tx-medium">{{ $object->lastname }}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- end row firstname and lastname --}}
                                                        {{-- start row  username and email --}}
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 mb-1">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5"
                                                                        for="username">{{ trans('translation.user_form_username') }}</label>
                                                                    <div class="">
                                                                        <span
                                                                            class="tx-medium">{{ $object->username }}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 mb-1">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5"
                                                                        for="email">{{ trans('translation.user_form_email') }}</label>
                                                                    <div class="">
                                                                        <span
                                                                            class="tx-medium">{{ $object->email }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- end row username and emai --}}
                                                        {{-- start row  profession and phone --}}
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 mb-1">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5"
                                                                        for="profession">{{ trans('translation.user_form_profession') }}</label>
                                                                    <div class="">
                                                                        <span
                                                                            class="tx-medium">{{ $object->profession }}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 mb-1">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5"
                                                                        for="phone">{{ trans('translation.user_form_phone') }}</label>
                                                                    <div class="">
                                                                        <span
                                                                            class="tx-medium">{{ $object->phone }}</span>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        {{-- end row profession and phone --}}
                                                        {{-- start row  country and state --}}
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 mb-1">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5" for="country">
                                                                        {{ trans('translation.user_form_country') }} &nbsp; </label>
                                                                    <div class="">
                                                                        <span
                                                                            class="tx-medium">{{ $object->country->name ?? null}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 mb-1">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5" for="country">
                                                                        {{ trans('translation.user_form_state') }} &nbsp;</label>
                                                                    <div class="">
                                                                        <span
                                                                            class="tx-medium">{{ $object->state->name ?? null}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        {{-- end row  country and state  --}}
                                                        {{-- start row  city and code postale --}}
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 mb-1">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5" for="country">
                                                                        {{ trans('translation.user_form_city') }} &nbsp; </label>
                                                                    <div class="">
                                                                        <span
                                                                            class="tx-medium">{{ $object->city->name ?? null }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 mb-1">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5"
                                                                        for="codepostale">{{ trans('translation.user_form_codepostale') }}</label>
                                                                    <div class="">
                                                                        <span
                                                                            class="tx-medium">{{ $object->codepostale }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        {{-- end row  city and code postale --}}
                                                        {{-- start  row gender and website --}}
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 mb-1">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5"
                                                                        for="gender">{{ trans('translation.user_form_gender') }}</label>
                                                                    {{-- <input type="text" value="{{$object->gender}}" id="gender"
                                                                        class="form-control" name="gender"> --}}
                                                                    <div class="">
                                                                        <span
                                                                            class="tx-medium">{{ $object->gender }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 mb-1">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5"
                                                                        for="website">{{ trans('translation.user_form_website') }}</label>
                                                                    <div class="">
                                                                        <span
                                                                            class="tx-medium">{{ $object->website }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- start  row gender and website --}}

                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5"
                                                                        for="adresse">{{ trans('translation.user_form_adresse') }}</label>
                                                                    <p class="tx-medium">{{ $object->adresse }}</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="text-black fs-5"
                                                                        for="biographie">{{ trans('translation.user_form_biographie') }}</label>
                                                                    <p class="tx-medium">{{ $object->biographie }}</p>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                    </div>

                                                    {{-- <div class="tab-pane" id="user_social_network" role="tabpanel">

                                                        <div class="form-group mb-3">
                                                            <label for="facebook" class="text-black fs-5">facebook</label>
                                                            <div>
                                                                <span class="tx-medium">{{ $object->facebook }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="twitter" class="text-black fs-5">twitter</label>
                                                            <div>
                                                                <span class="tx-medium">{{ $object->twitter }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="instagram"
                                                                class="text-black fs-5">Instagram</label>
                                                            <div>
                                                                <span class="tx-medium">{{ $object->instagram }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="linkedin" class="text-black fs-5">linkedin</label>
                                                            <div>
                                                                <span class="tx-medium">{{ $object->linkedin }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="tiktok" class="text-black fs-5">tiktok</label>
                                                            <div>
                                                                <span class="tx-medium">{{ $object->tiktok }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="googleplus" class="text-black fs-5">Google
                                                                plus</label>
                                                            <div>
                                                                <span class="tx-medium">{{ $object->googleplus }}</span>
                                                            </div>
                                                        </div>

                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div>
                    </div>
                </div>
                <!--end tab-pane-->
            </div>
        </div>
    </div>
    </div>

@endsection
@section('js')
    <!-- swiper js -->
    <script src="{{ 'assets/libs/swiper/swiper-bundle.min.js' }}"></script>
    <!-- profile init js -->
    <script src="{{ 'assets/js/pages/profile.init.js' }}"></script>
@endsection
