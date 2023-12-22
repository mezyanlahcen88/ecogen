<div class="tab-pane fade" id="v-pills-bill-info" role="tabpanel" aria-labelledby="v-pills-bill-info-tab">
    <div>
        <h5>Billing Info</h5>
        <p class="text-muted">Fill all information below</p>
    </div>

    <div>
        <div class="row g-3">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="Enter first name" value="" required >
                <div class="invalid-feedback">Please enter a first name</div>
            </div>

            <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Enter last name" value="" required >
                <div class="invalid-feedback">Please enter a last name</div>
            </div>

            <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" id="username" placeholder="Username" required >
                    <div class="invalid-feedback">Please enter a user name</div>
                </div>
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" />
            </div>
        </div>
    </div>

    <div class="d-flex align-items-start gap-3 mt-4">
        <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-bill-address-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Go to Shipping</button>
    </div>
</div>
