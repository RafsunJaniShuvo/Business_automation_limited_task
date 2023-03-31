@extends('layout.app')
@section('main')
  <body>
    <div class="container mt-0">
        <div class="card">

            <div class="card-header bg-success text-white " align="center">
                User Information Table
            </div>



            <div class="d-flex justify-content-between bd-highlight mt-3">
                <div>
                  <a href="{{route('dashboard')}}" class="btn btn-success mx-2" >
                    <i class="fa-solid fa-arrow-left"></i>
                    Back
                  </a>
                </div>

                <div >
                  <button type="button" class="btn btn-primary mb-2 addinfo" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-plus"></i>
                    Add info
                  </button>

                  <a href="{{url('/image')}}" class="btn btn-primary mb-2 addinfo" style="margin-right: 20px;">
                    <i class="fa-solid fa-plus"></i>
                    Images
                  </a>
                </div>

            </div>

                <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-12 mx-auto table-responsive">
              <table class="table"  id="myTable" >
                <thead>
                  <tr>
                    <th scope="col" width="5%">Sl_No.</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Qualification</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">status</th>
                    <th scope="col" width="10%">description</th>
                    <th scope="col" width="10%" >Image</th>
                    <th scope="col" width="15%">Action</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
        </div>
      </div>

      <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header bg-success text-white">
                <h5 class="modal-title " id="exampleModalLabel" >Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="alert alert-danger" style="display:none"></div>
              <div class="modal-body">
                <form action="#" id="modal_form" class="modal_form" enctype="multipart/form-data">
                  @csrf
                  <input type="number" id="id" hidden>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="mb-3">
                        <label for="user_name" class="form-label required"> User Name</label>
                        <input type="text" class="form-control" id="user_name" name="name" placeholder="User Name" >
                          <span id="response_name" style="color:red;"></span>

                        {{-- {!! $errors->first('user_name','<span class="help-block">:message</span>') !!} --}}
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>

{{--                          pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}--}}

                        <input type="email" class="form-control" id="email"  name="email" placeholder="name@example.com"  pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" >
                        <span id="response_email" style="color:red;"> </span>

                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="mb-3">
                        <span id="Gender">Gender</span><br>
                          <input type="radio" class="gender" name="gender"  value="1" >
                         <label for="gender">Male</label><br>
                         <input type="radio" class="gender" name="gender" value="0" >
                          <label for="gender">Female</label><br>
                        <span id="response_gender" style="color:red;"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Qualifications</label>
                        <select class="form-select" aria-label="Default select example" id="qualification" name="qualification" >
                          <option value="">Open this select menu</option>
                          <option value="0">B.Sc</option>
                          <option value="1">H.Sc</option>
                          <option value="2">S.Sc</option>
                        </select>
                        <span id="response_qualification" style="color:red;"></span>

                      </div>
                    </div>
                    <div class="col-md-4">
                          <div class="mb-3">
                                <label for="birthday" class="form-label">Birthday</label>
                                  <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Birthday" >
                                <span id="response_birthday" style="color:red;"></span>
                          </div>

                    </div>
                    <div class="col-md-4">
                          <div class="my-3">
                                <input type="checkbox" name="status"  id="status" value="1">
                                <label for="status" class="form-label">is_active?</label>

                          </div>
                    </div>
                  </div>


                  <div class="row" id="addimage">

                        <div class="col-md-4">

                            <input class="form-control image-upload" type="file"  value="" name="image_upload[]" accept="image/png, image/jpg, image/jpeg, image/gif" enctype="multipart/form-data" >
                            <p id="img_msg"></p>
                            <div  id="img_id"> </div>
                        </div>

                        <div class="col-md-5">
                          <button type="button" class="btn btn-success addMore" > + </button>
                        </div>
                        <span id="response_image" style="color:red"></span>

                  </div>
                  <div class="row" >
                        <div class="col-md-12">
                          <label for="desc">Description</label>
                          <textarea  class="form-control" type="text" id="desc" name="desc" placeholder="Leave a short descrition" > </textarea>
                            <span id="response_desc" style="color:red;"></span>
                        </div>
                  </div>
                  </div>
                      <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary save">Save</button>
                            <button type="button" class="btn btn-primary update">Update</button>
                      </div>
                </div>
              </form>
          </div>

        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
{{--    jquery dataTables--}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
{{--    jquery validate--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--    jquery date picker--}}
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    {{--  onkeyup method for jquery validation--}}
    <script>
        // jquery validate

        $(document).ready(function () {
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
                            required:true,
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
                            maxlength: 1000,
                        }

                    },
                    messages: {
                        name: {
                            required: "Please enter your name",
                            minlength: "Your data must be at least 3 characters",
                        },
                        email:{
                            required:"Please give your email",
                        },
                        gender:{
                            required:"Select the radio button",
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
                            required:"Enter your message 10-1000 characters",
                        },

                    },
                    submitHandler: function (form,event) { // for demo
                        event.preventDefault();
                        // alert('valid form submitted'); // for demo

                        $('.modal_form').submit(function(e){
                            e.preventDefault();
                            var formData = new FormData($('.modal_form')[0]);
                            $.ajax({
                                type:"POST",
                                // dataType:"json",
                                url:"{{route('store_info')}}",
                                data: formData,

                                // data:formdata,
                                contentType: false,
                                processData: false,

                                success:function(response){
                                    if(response.status=='success'){
                                        alert("Information saved successfully");
                                        $('#exampleModal').modal('hide');
                                        $('#myTable').DataTable().ajax.reload();

                                    }
                                },
                                error:function(response){
                                    console.log(response)
                                    alert("something went wrong");

                                    $('#response_email').html(response.responseJSON.errors.email);
                                    $('#response_name').html(response.responseJSON.errors.user_name);
                                    $('#response_gender').html(response.responseJSON.errors.gender);
                                    $('#response_birthday').html(response.responseJSON.errors.birthday);
                                    $('#response_desc').html(response.responseJSON.errors.desc);
                                    $('#response_qualification').html(response.responseJSON.errors.qualification);
                                    $('#response_image').html('');
                                    $('#response_image').html(response.responseJSON.errors.image_upload);


                                }
                            })

                        })





                    }


                });
            });




            //date picker
            $( function() {
                $( "#birthday" ).datepicker();
            } );


            //clean up modal
            // $('#exampleModal').on('hidden.bs.modal', function (e) {
            //     $(this)
            //         .find("input,textarea,select,input[type=checkbox],input[type=radio")
            //         .val('')
            //         .prop("checked", "checked")
            //         .end()
            //         // .find("input[type=checkbox], input[type=radio]")
            //         // .val('')
            //         // .prop("checked", "checked")
            //         // .end();
            // })


    </script>

    <script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   $(document).ready(function(){

    let ajaxtable = $('#myTable').DataTable({
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

            return data.gender == '0' ? 'Female' : 'Male';
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

         {"data":null,
         render: function(data,type) {

                // console.log(data);
                return '<img src="' + data.images + '" height="100px" width="100px"/>';

             }
         },
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

    //  append input multiple images
    $('.addMore').click(function(){
            $('#addimage').append(`
            <div class="col-md-4">

               <input class="form-control image-upload" type="file"  name="image_upload[]" enctype="multipart/form-data" multiple>
               <p id="img_msg"></p>
           </div>`);
        });



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
          // console.log('#gender[value="' + response.gender + '"]');

          // $('#gender[value="' + response.gender + '"]').attr('checked', true); //most important and challenging
          // $("#status[value='" + response.status + "']").attr('checked', true); //most important and challenging


           $(document.body).find('.gender[value="' + response.gender + '"]').prop('checked', true);

           $(document.body).find('#status[value="' + response.status + '"]').prop('checked', true);



            $('#img_id').html('');
            $('#img_id').html('<img width="50px" src="' + response.images + '" />');

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

          // let user_name=$('#user_name').val();
          // let email= $('#email').val();
          // let qualification= $('#qualification').val();
          // let birthday=$('#birthday').val() ;
          // let status=$('#status').val() ;
          // let desc=$('#desc').val() ;
          // let gender=$("input[type='radio'][name='gender']:checked");//get radio button value
          // if(gender.length>0){                                      //get radio button value
          //   gender=gender.val();                                    //get radio button value
          // }                                                         //get radio button value

         let form_update_data = new FormData($('#modal_form')[0]);


          $.ajax({
            type:"POST",
            dataType:"json",
            url:'/update-data/'+id,
            // data:{user_name:user_name,email:email,qualification:qualification,birthday:birthday,status:status,desc:desc,gender:gender},

              data:form_update_data,
              contentType: false,
              processData: false,
            success:function(response){
              if(response.status=='success'){
                alert("Information updated successfully");
                $('#exampleModal').hide();
                location.reload();


              }
            },
            error:function(response){
              console.log(response.customMessages)
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



</body>
  @endsection
</html>
