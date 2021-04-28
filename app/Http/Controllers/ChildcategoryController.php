<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Subcategory;
use App\DataTables\ChildcategoryDataTable;
use App\Repositories\CategoryRepository;
use App\Repositories\ChildCategoryRepository;

use App\Repositories\SubCategoryRepository;
use App\Repositories\CustomFieldRepository;
use App\http\Requests\CreateChildCategoryRequest;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\UploadRepository;
use Laracasts\Flash\Flash;

class ChildcategoryController extends Controller
{
  public function __construct(SubCategoryRepository $SubcategoryRepository, CustomFieldRepository $customFieldRepo , UploadRepository $uploadRepo,
  ChildCategoryRepository $ChildCategoryRepository)
    {
        parent::__construct();
        $this->subcategoryRepository = $SubcategoryRepository;
        $this->ChildCategoryRepository = $ChildCategoryRepository;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;
    }
    public function showChild(ChildcategoryDataTable $ChildcategoryDataTable)
    {
      try{
        $subcategory=Subcategory::find(request()->id);
        return $ChildcategoryDataTable->render('childcategory.index',['subcategory'=>$subcategory]);

      } catch (\Exception $ex) {
        Flash::error('Sorry !!!!! You must enter ChildCategory it first');
        return redirect()->route('subcategories.index');

      }
    }

      public function create(){
        $subcategory = $this->subcategoryRepository->pluck('name', 'id');
    
      
        $hasCustomField = in_array($this->ChildCategoryRepository->model(),setting('custom_field_models',[]));
        if($hasCustomField){
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->ChildCategoryRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('childcategory.create')->with("customFields", isset($html) ? $html : false)->with("subcategory", $subcategory);
        
       }
       public function store(CreateChildCategoryRequest $request)
   {
       $input = $request->all();
      
     
       $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->ChildCategoryRepository->model());
       try 
       {  
        $childcategory = $this->ChildCategoryRepository->create($input);
       
        } 
       catch (ValidatorException $e) {
           Flash::error($e->getMessage());
       }

       Flash::success('Subcategory created successfully', ['operator' => __('lang.product')]);
       $id=$childcategory->subcategory_id;
       return redirect(route('show-child',$id));
   }
    
}
