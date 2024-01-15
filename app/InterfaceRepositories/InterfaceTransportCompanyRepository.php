<?php

namespace App\InterfaceRepositories;

use App\Models\CompanyGroupe;
use App\Models\TransportCompany;


Interface InterfaceTransportCompanyRepository{


    // create Transport Company
    public function CreateTransportCompany($id): array;

    // get Transport Company
    public function GetTransportCompany($id): array;

    // update Transport Company
    public function UpdateTransportCompany($request,$id): bool;

    // delete Transport Company
    public function DeleteTransportCompany($request,$id): bool;

    // change status Transport Company
    public function changeStatus($request);

    // delete multiple Transport Company
    public function delete_all($request);

}


