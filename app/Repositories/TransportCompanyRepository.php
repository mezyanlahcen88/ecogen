<?php

namespace App\Repositories;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Str;
use App\Models\CompanyGroupe;
use App\Traits\FileUploadTrait;
use App\Models\TransportCompany;
use App\Forms\TransportCompanyForm;
use App\Services\ObjectCrudService;
use App\InterfaceRepositories\InterfaceTransportCompanyRepository;

class TransportCompanyRepository implements InterfaceTransportCompanyRepository{

    use FileUploadTrait;


    protected $objectCrudService;

    const MODEL = 'App\Models\TransportCompany';

    public function __construct(ObjectCrudService $objectCrudService, )
    {
        $this->objectCrudService = $objectCrudService;
    }



    // **********************************************create Transport Company****************************************
    public function CreateTransportCompany($id): array{
        $data['companygroupe'] = CompanyGroupe::select('id','groupe_name')->where('id',$id)->first();
        $data['countries']=Country::select('id','name')->get();;
        $data['pcs']=Country::select('currency')->distinct('currency')->get();
        return $data;
    }



    // *********************************get Transport Company*****************************************
    public function GetTransportCompany($id): array{
        $data['object'] = TransportCompany::findOrFail($id);
        $data['countries'] = Country::select('id','name')->get();
        $data['states'] = State::where('country_id',$data['object']->country)->get();
        $data['cities'] = City::where('state_id',$data['object']->state)->get();
        $data['pcs'] = Country::select('currency')->distinct('currency')->get();
        return $data;
    }



    // **************************************update Transport Company************************************
    public function UpdateTransportCompany($request,$id): bool{

        $validated = $request->validated();
        $object = TransportCompany::findOrFail($id);

        $object = $this->objectCrudService->AttributeRequestWithFileObject($request,$object,self::MODEL,'images/transportcompanies/');

        // $objectFields = $this->objectCrudService->AttributeRequestObject($request,$object);
        // $objectFileFields =$this->objectCrudService->AttributeRequestFileObject($request,$object,'images/transportcompanies/');

        $object->save();
         return true;
    }

    //*******************************************delete Transport Company************************************
    public function DeleteTransportCompany($request,$id): bool{

        $object = TransportCompany::findOrFail($request->id);
        $object->delete();
        flash()->addError('Socièté a été supprimé avec success.');

        return $object;
    }

    // ***********************************************change status Transport Company************************
    public function changeStatus($request)
        {
            $id = $request->id;
            $object = TransportCompany::findOrFail($id);
            $object->isActive = !$object->isActive;
            $object->save();
            return response()->json(['code'=>200,'isactive'=>$object->isActive]);
        }



    // delete multiple Transport Company
    public function delete_all($request){

    }





    public function create(array $data): Person
    {
        return Person::create($data);
    }

    public function getById(int $id): ?Person
    {
        return Person::find($id);
    }

    public function update(Person $person, array $data): bool
    {
        return $person->update($data);
    }

    public function delete(Person $person): bool
    {
        return $person->delete();
    }

}
