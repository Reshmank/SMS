@extends('layouts.app')

@section('style')

<style type="text/css">
    
.error{

    color: red;
}


</style>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Supplier Managment System</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
  </li>

  <li class="nav-item" role="presentation">
    <button class="nav-link" id="supplier-tab" data-bs-toggle="tab" data-bs-target="#suppliers" type="button" role="tab" aria-controls="suppliers" aria-selected="false">Suppliers</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="supplier_list-tab" data-bs-toggle="tab" data-bs-target="#supplier_list" type="button" role="tab" aria-controls="withdraw" aria-selected="false">Supplier List</button>
  </li>
  
  
</ul>
<div class="tab-content" id="myTabContent">


  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<br>    
    <div class="card">

            <div class="card-header">Welcome  {{ Auth::user()->name }}</div>
        <div class="card-body">

         

            <div class="row">

                <div class="col-md-12">

                    <div class="col-md-6">
                        
                         Email Id   :   {{ Auth::user()->email }} 
                    </div>

                    <div class="col-md-6">
                        
                         Name    :   {{ Auth::user()->name  }}
                    </div>


                    

                </div>
                

            </div>

    
  </div>
</div>
  </div>

 <div class="tab-pane fade" id="suppliers" role="tabpanel" aria-labelledby="supplier-tab">
      
      <br>

        <div class="card">
        <div class="card-header">Supplier</div>
        <div class="card-body">

           <form id="supplierForm">

            <input type="hidden" name="suppler_id" id="suppler_id">

             <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Name <span class="error">*</span></label>

                            <div class="col-md-6">
                            <input  onkeyup="createCode(this,'slug')" type="text" class="form-control required_item"  name="name" value="{{ old('name') }}" id="name">

                            </div>
                        </div>

              <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Code</label>

                            <div class="col-md-6">
                            <input id="code" type="text" class="form-control"  name="code" value="{{ old('code') }}">

                            </div>
                        </div>   

              <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Email </label>

                            <div class="col-md-6">
                            <input id="email"  type="email" class="form-control"  name="email" value="{{ old('email') }}">

                            </div>
                        </div>    

                 <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Fax </label>

                            <div class="col-md-6">
                            <input id="fax"  type="text" class="form-control"  name="fax" value="{{ old('fax') }}">

                            </div>
                        </div>                            

             <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label text-md-end">Address </label>

                            <div class="col-md-6">
                    <textarea name="address" class="form-control" id="address">{{ old('address') }}</textarea>
                          
                            </div>
            </div> 

              <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Phone <span class="error">*</span></label>

                            <div class="col-md-6">
                            <input id="phone"  type="text" class="form-control required_item"  name="phone" value="{{ old('phone') }}" maxlength="10">

                            </div>
                        </div> 

                  <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">TRN </label>

                            <div class="col-md-6">
                            <input id="phone"  type="fax" class="form-control"  name="trn" value="{{ old('trn') }}">

                            </div>
                        </div>    

                 <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Credit Period</label>

                            <div class="col-md-6">
                            <input id="credit_period"  type="fax" class="form-control"  name="credit_period" value="{{ old('credit_period') }}">

                            </div>
                        </div>             
          

          <div class="row col-md-12 varient_dev">
            
              
              <table class="table table-bordered">
    <thead>
      <tr>
        <th>Description</th>
        <th>Phone </th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Fax</th>
        <th><button type="button" class="ms-2 add_supplier_contacts">+</button></th>
      </tr>
    </thead>
    <tbody class="contact_append">
      <tr class="first_dev row-index">
        <td><input type="text" name="contact_description[]" class="form-control" required></td>
        <td><input type="text" name="contact_phone[]" class="form-control" required></td>
        <td><input type="text" name="contact_mobile[]" class="form-control" required></td>
        <td><input type="email" name="contact_email[]" class="form-control" required></td>
        <td><input type="text" name="contact_fax[]" class="form-control" required></td>
       <td> <button type="button" class="ms-2 remove-varient">-</button></td>
      </tr>
     
    </tbody>
  </table>

          </div>

                  

                          <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>

                               
                            </div>
                        </div>

           </form>
</div>
</div>

</div>

<div class="tab-pane fade show" id="supplier_list" role="tabpanel" aria-labelledby="supplier_list-tab">

<br>    
    <div class="card">

            <div class="card-header">Supplier List</div>
        <div class="card-body">

            <div class="tab-pane fade show active m-0" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                  <div class="dt-responsive table-responsive data-hw">
                     <table class="table text-md-nowrap key-buttons" width="100%" id="supplierListTable">
                        <thead>
                           <tr>
                              <th data-data="DT_RowIndex" data-orderable="false">#</th>
                              <th data-data="supplier_name">Supplier Name</th>
                              <th data-data="created_by">Created By</th>
                              <th data-data="created_at" >Created At</th>
                              <th data-data="action">Action</th>
                              
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>



         

          

     

     
  </div>
</div>
  </div>





</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

<script>

 $(document).ready(function(){

    function createCode(e,valueTo,uppercase=false,$prefix=""){
     document.getElementById(valueTo).value = $prefix+e.value
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
    if(uppercase){
        document.getElementById(valueTo).value = document.getElementById(valueTo).value.toUpperCase();
    }
    return true;
}

     
     $('#varientForm').validate({ // initialize the validation
        rules: {
            name :{
               required: true,
            },
          
        },
        messages: {
            name:{
                required: "Please enter name",
            },
                     
        },

        errorElement: "div",
       
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.required_item'));
        }
    });

      $('.contact_append').on('click', '.remove-varient', function () {

    

         $(this).closest('.row-index').remove();  

      });





      $('.add_supplier_contacts').on('click', function () {

            $('.contact_append').append(` <tr class="row-index">
        <td><input type="text" name="contact_description[]" class="form-control" required></td>
        <td><input type="text" name="contact_phone[]" class="form-control" required></td>
        <td><input type="text" name="contact_mobile[]" class="form-control" required></td>
        <td><input type="email" name="contact_email[]" class="form-control" required></td>
        <td><input type="text" name="contact_fax[]" class="form-control" required></td>
       <td> <button type="button" class="ms-2 remove-varient">-</button></td>
       
      </tr>
`);


    
      });



  callBackDataTablesSan('#supplierListTable',"{{ url('supplier_list') }}",{dom:'frtip'});
    
  $('#supplierForm').validate({ // initialize the validation
        rules: {
            name :{
               required: true,
            },
            phone :{
               required: true,
            },
         
 
        },
        messages: {
            name:{
                required: "Please enter title",
            },
             phone:{
                required: "Please enter description",
            },
          
                     
        },

        errorElement: "div",
       
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.required_item'));
        }
    });

    $('#supplierForm').submit(function(e){
            e.preventDefault();

        if($('#supplierForm').valid()){

         var form = $('#supplierForm')[0];
         var formData = new FormData(form);
         formData.append("_token",'{{ csrf_token() }}');
         
          $.ajax({
                    type: "POST",
                    url: '/addSupplier',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                    data: formData, 
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        if(response.status==true){

                           iziToast.success({
                                    title: 'Success!',
                                    message:response.message,
                                    position: 'topRight'
                                });  

                                $('#supplier_list-tab').addClass('active'); 
                                $('#supplier_list').addClass('active');
                                $('#supplier-tab').removeClass('active'); 
                                $('#suppliers').removeClass('active');  
                                $('#supplierListTable').DataTable().ajax.reload();

                            // setTimeout(function() {
                            //         window.location.href = "/home";
                            //     },6000);


                        }
                        else
                        {
                             iziToast.error({
                                        title: 'error !',
                                        message: response.message,
                                        position: 'topRight'
                                    });

                        
                        }
                      
                    },
                    error: function(err) {

                             iziToast.error({
                                        title: 'error !',
                                        message: 'Something went wrong from server',
                                        position: 'topRight'
                                    });

                        
                    }
                });
      }
                

            });


 });

 function editData(id)
 {
          var html='';    
         $.ajax({
                             
                             url: '/editSupplier',
                             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                           
                            data: {
                                id:id,
                               
                            },
                            success: function (output) { 


                                   if(output.status==true){

                                    $('#name').val(output.result.name);
                                    $('#code').html(output.result.code);
                                    $('#phone').html(output.result.phone);
                                    $('#supplier_id').val(output.result.id);

                          

                   $.each(output.result.supplier_contacts, function(index1, val1){

                

        html+=`<tr class="row-index">
        <td>

          <td><input type="text" name="contact_description[]" value="`+val1['description']+`" class="form-control"></td>
            <td><input type="text" name="contact_phone[]" value="`+val1['phone']+`" class="form-control"></td>
              <td><input type="text" name="contact_mobile[]" value="`+val1['mobile']+`" class="form-control"></td>
      
        <td><input type="text" name="contact_email[]" value="`+val1['email']+`" class="form-control"></td>   <td><input type="text" name="contact_fax[]" value="`+val1['fax']+`" class="form-control"></td><td> <button type="button" class="ms-2 remove-varient">-</button></td>
       
      </tr>`;

                         
                   });  


                     $('.contact_append').append(html);
                                    

                                $('#supplier_list-tab').removeClass('active'); 
                                $('#supplier_list').removeClass('active');
                                $('#supplier-tab').addClass('active'); 
                                $('#suppliers').addClass('active'); 

                                $('#suppliers').addClass('show');  
                                $('#suppliers').removeClass('fade');
                                $('.first_dev').css("display", "none");

                                       
                                   }


                            },
                            error: function (output) {
                            }
                        });





 }


   function deleteData(id)
        {
            var msg="Do you want to delete?";
           

            $.confirm({
            title: 'Are you sure ',
            content: msg,
            type:'blue',
            buttons: {
                    confirm: function () {
                        $.ajax({
                             
                             type: 'POST',
                             url: '/deleteSupplier',
                             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                           
                            data: {
                                id:id,
                               
                            },
                            success: function (output) { 


                                   if(output.status==true){

                                        iziToast.success({
                                            title: 'Success!',
                                            message:output.message,
                                            position: 'topRight'
                                        });  


                                     $('#supplierListTable').DataTable().ajax.reload();

                                   }


                            },
                            error: function (output) {
                            }
                        });
                    },
                    cancel: function () {

                    },

                }
            });
    
        }

</script>




@endsection
