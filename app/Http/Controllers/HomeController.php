<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Suppliers;
use App\Models\Supplier_Contacts;
use App\Models\User;
use App\Helpers\Helper;
use Auth;
use yajra\Datatables\Datatables;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('home');
    }


    public function addSupplier(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone'=>'required'
            ]);



       
         if ($validator->fails()) {

             foreach ($validator->errors()->getMessages() as $key => $value) {

                return response()->json(['status'=>false,'errorCode'=>1,'message' =>$value[0],'response' => $validator->errors()->all()], 200);
            }

         }

        // supplier

         if($request->suppler_id)
         {

              $suppliers= Suppliers::findorfail($request->suppler_id);
         }
         else
         {
              $suppliers= new Suppliers();
         }


         $suppliers->name=$request->name;
         $suppliers->code=$request->code;
         $suppliers->email=$request->email;
         $suppliers->fax=$request->fax;
         $suppliers->created_by=Auth::user()->id;
         $suppliers->updated_by=Auth::user()->id;
         $suppliers->address=$request->address;
         $suppliers->trn=$request->trn;
         $suppliers->phone=$request->phone;
         $suppliers->credit_period=$request->credit_period;



         if($suppliers->save()){


         
        
           
              //  supplier conatcts

            $supplier_description=$request->contact_description;
            $supplier_phone=$request->contact_phone;
            $supplier_email=$request->contact_email;
            $supplier_mobile=$request->contact_mobile;
            $supplier_fax=$request->contact_fax;

          
            if(!empty($supplier_description))
            { 

                   $delete=Supplier_Contacts::where('fk_supplier_id',$suppliers->id)->delete();

                   foreach ($supplier_description as $key => $value) {

                           if($value)
                           {
                                   // code...
                                   $contacts= new Supplier_Contacts(); 
                                   $contacts->description=$value;
                                   $contacts->phone=$supplier_phone[$key];
                                   $contacts->mobile=$supplier_mobile[$key];
                                   $contacts->email=$supplier_email[$key];
                                   $contacts->fax=$supplier_fax[$key];
                                   $contacts->fk_supplier_id=$suppliers->id;
                                   $contacts->created_by=Auth::user()->id;
                                   $contacts->updated_by=Auth::user()->id;
                                   $contacts->save();


                           }
                    

                   }


            }



             if($request->suppler_id)
              {
                  return response()->json(['status'=>true,'errorCode'=>-1,'message' => 'Supplier Updated Successfully !'], 200); 
        
              }
              else
              {

                   return response()->json(['status'=>true,'errorCode'=>-1,'message' => 'Supplier Created Successfully !'], 200); 
              }
          

            
                 

          
         }
         else
         {
             return response()->json(['status'=>false,'errorCode'=>-1,'message' => 'error'], 200); 
         }

    }

    public function deleteSupplier(Request $request)
    {
       
        try {
             $delete=Supplier_Contacts::where('fk_supplier_id',$request->id)->delete();  

             if($delete)
             {
                   Suppliers::where('id',$request->id)->delete();
                      return response()->json(['status'=>true,'errorCode'=>-1,'message' => 'Supplier Deleted Successfully !'], 200); 
             }
           
             
            
           
            
        } catch (Exception $e) {
          
            return $e->getMessage();
        }



    }

    public function editSupplier(Request $request)
    {
         if($request->id)
         {
              $suppliers=Suppliers::with('supplierContacts')->where('id',$request->id)->first();

               return response()->json(['status'=>true,'errorCode'=>-1,'result' =>$suppliers], 200); 


              

         }


    }

     public function supplier_list(Request $request)
     {
           if ($request->ajax())
            {
                 $suppliers=Suppliers::select('suppliers.name as supplier_name','users.name as created_by','suppliers.created_at','suppliers.id')
                  ->join('users','users.id','suppliers.created_by')
                 ->orderBy('suppliers.created_at','desc')
                 ->get();

                  return Datatables::of($suppliers)
                 ->addIndexColumn()
                 ->editColumn('created_at', function($suppliers){
                    if($suppliers->created_at==NULL){
                        return '';
                    }else{
                        return date('d-m-Y H:i:s', strtotime($suppliers->created_at));
                    }  
                 })
                  ->editColumn('action', function ($suppliers) {

                    $row='';

                   $row = '<a  class="dlt-btn p-0" onclick="deleteData(' . $suppliers->id .')"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                   $row=$row.' ';

                   $row=$row.'<a  class="dlt-btn p-0" onclick="editData(' . $suppliers->id .')"><i class="fas fa-edit" aria-hidden="true"></i></a>';

                      return $row;
                  })
                ->rawColumns(['action'])
                ->make(true);

            }


     }
}
