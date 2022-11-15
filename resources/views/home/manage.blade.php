<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manage Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
       textarea.error{ border: 1px solid #FF0000 !important;}
    </style>
  </head>
  <body>
    <div class="container mt-5">
      <button type="button" class="btn btn-primary mb-2 addinfo" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 82%;">
        <i class="fa-solid fa-plus"></i>Add info
      </button>
      
      <div class="row d-flex justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <table class="table" id="myTable">
              <thead>
                <tr>
                  <th scope="col">Sl_No.</th>
                  <th scope="col">User Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Qualification</th>
                  <th scope="col">Birthday</th>
                  <th scope="col">status</th>
                  <th scope="col">description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
             
              </tbody>
            </table>
        </div>
        </div>
      </div>

      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="alert alert-danger" style="display:none"></div>
          <div class="modal-body">
            <form action="" id="modal_form">

            <input type="number" id="id" hidden>
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="user_name" class="form-label required"> User Name</label>
                  <input type="text" class="form-control" id="user_name" name="name" placeholder="User Name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="email"  name="email" placeholder="name@example.com"  required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <span>Gender</span><br>
                    <input type="radio" id="gender" name="gender"  value="1" >
                    <label for="gender">Male</label><br>
                    <input type="radio" id="gender" name="gender" value="0" >
                    <label for="gender">Female</label><br>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Qualifications</label>
                  <select class="form-select" aria-label="Default select example" id="qualification" name="qualification" required>
                    <option selected>Open this select menu</option>
                    <option value="0">B.Sc</option>
                    <option value="1">H.Sc</option>
                    <option value="2">S.Sc</option>
                  </select>
                
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="birthday" class="form-label">Birthday</label>
                  <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="my-3">
                  <label for="status" class="form-label">is_active?</label>
                  <input type="checkbox" name="status" id="status" value="1">
               
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="desc">Description</label>
                <textarea  class="form-control" type="text" id="desc" name="desc" placeholder="Leave a short descrition" > </textarea>
              </div>
            </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary save">Save</button>
            <button type="button" class="btn btn-primary update">Update</button>
          </div>
        </div>
      </div>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    
    <script>
  
  
      

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   $(document).ready(function(){
     $('#myTable').DataTable({
      "processing":true,
      "serverSide":true,
      "ajax":"{{route('ajax.getData')}}",
      "columns":[
        {"data":"id"},
        {"data":"user_name"},
        {"data":"email"},
        {"data":null,
          render:function(data,type,row)
          { 
           
            return data.gender =='0'?'Female':'Male';
          }
        },
        {"data":null,
            render:function(data,type,row){
              // console.log(data.qualification);
              let quali = '';
              switch(data.qualification){
                case '0':
                  quali = 'B.Sc';
                  break;
                case '1':
                    quali = 'H.Sc';
                    break;
                case '2':
                  quali = 'S.Sc';
                  break;

              }
              return quali;
            }
        },
        {"data":"birthday"},
        {"data":null,
            render:function(data){
             return data.status =='0' ? 'Inactive' : 'Active';
            }
         },
        {"data":"description"},
        {"data":"actions",
          },
      ]
     

     });

     //hide update button normally
     $(document).ready(function(){
        $('.addinfo').click(function(){
          $('.update').hide();
        })
     })
   
     ///Save

     $(document).ready(function(){
        $('.save').click(function(){
          let user_name=$('#user_name').val();
          let email= $('#email').val();
          let qualification= $('#qualification').val();
          let birthday=$('#birthday').val() ;
          let status=$('#status').val() ;
          let desc=$('#desc').val() ;
          let gender=$("input[type='radio'][name='gender']:checked");
          if(gender.length>0){
            gender=gender.val();
          }
          // console.log(user_name,email,qualification,birthday,status,desc,gender)
          $.ajax({
            type:"POST",
            dataType:"json",
            url:"{{route('store_info')}}",
            data:{user_name:user_name,email:email,qualification:qualification,birthday:birthday,status:status,desc:desc,gender:gender},
            success:function(response){
              if(response.status=='success'){
                alert("Information saved successfully");
                $('#exampleModal').hide();
                location.reload();


              }
            },
            error:function(response){
              jQuery('.alert-danger').show();
              alert("Failed to insert data");
            }
          })
          //  console.log('gender:',gender)
          // console.log(user_name,email,gender,qualification,birthday,status,desc)
        })
         
        
     })



     ///Edit button
     $(document).on('click','.editbutton',function(){
      var product_id = $(this).data('id');
      // alert(product_id)
      $.ajax({
        type:"get",
        dataType:"json",
        url: '/edit-data/' + product_id,
        success:function(response){
          $('#id').val(response.id);
          $('#user_name').val(response.user_name);
          $('#email').val(response.email);
          $('#desc').val(response.description);
          $('#qualification').val(response.qualification);
          $('#birthday').val(response.birthday);
          $("#gender[value='" + response.gender + "']").prop('checked', true); //most important and challenging
          $("#status[value='" + response.status + "']").prop('checked', true); //most important and challenging
          $('.save').hide();
          $('.update').show();
        },error:function(respnse){
          alert('not ok');
        }
      })
     })

     //update information
     $(document).on('click','.update',function(){
          let id = $('#id').val();
      
          let user_name=$('#user_name').val();
          let email= $('#email').val();
          let qualification= $('#qualification').val();
          let birthday=$('#birthday').val() ;
          let status=$('#status').val() ;
          let desc=$('#desc').val() ;
          let gender=$("input[type='radio'][name='gender']:checked");//get radio button value
          if(gender.length>0){                                      //get radio button value
            gender=gender.val();                                    //get radio button value
          }                                                         //get radio button value
          // console.log(id,user_name,email,qualification,birthday,status,desc,gender);
          $.ajax({
            type:"POST",
            dataType:"json",
            url:'/update-data/'+id,
            data:{user_name:user_name,email:email,qualification:qualification,birthday:birthday,status:status,desc:desc,gender:gender},
            success:function(response){
              if(response.status=='success'){
                alert("Information updated successfully");
                $('#exampleModal').hide();
                location.reload();


              }
            },
            error:function(response){
              alert("Failed to update data");
            }
          })

     })


     //Delete button
     $(document).on('click','.deletebutton',function(){
      var product_id = $(this).data('id');
      var confirmation = confirm("Are you want to sure to delete the item??");
      // alert(product_id);
      if(confirmation){
          $.ajax({
            type:"get",
            dataType:"json",
            url:'/delete-data/'+product_id,
            success:function(response){
              if(response.status=='success'){
                alert('Information Deleted Successfully');
                
                location.reload();
              }
            },
            error:function(response){
              alert('not ok');
            }
          })
        }

     })

    

   })


 
  </script>

  <script>

    $(function () {        

        $("#modal_form").validate({
        
            rules: {
              name: {
                      required: true,
                      minlength: 3,
                  },

                  email:{
                    required:true,

                  },
                  gender:{
                    required:true
                  },

                  qualification:{
                    required:true,
                  },

                  birthday:{
                    required:true,
                  },

                  status:{
                    required: true,
                  
                },
                  desc:{
                      required: true,
                      minlength: 10,
                      maxlength: 20,
                      lettersonly: true 
                  },
            
          },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Your data must be at least 8 characters",
                },
                email:{
                  required:"Please give your email",
                  email:true,

                },
                gender:{
                    required:"Select the radio button",
                    gender:true,
                },
                qualification:{
                    required:"Select your qualification",
                },
                birthday:{
                  required:"Give your Date of birth",
                },
                status:{
                  required:"Select if your are active user",
                },
                desc:{
                  required: "Enter your message 3-20 characters",
                  
              
                  
                },
                
            },
            errorElement: 'span',
            errorClass: 'text-danger',
          
          
        });
    });
   
  </script>
</body>
</html>