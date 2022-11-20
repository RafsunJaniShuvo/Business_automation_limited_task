<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>File</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
  <body>
    


    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-10">
              
                <!-- Button trigger modal -->

  
  <!-- Modal -->
  {{-- <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}


                <div class="card-header">
                        <div>
                        <h1 align ="center">File </h1>
                        </div>
                        <div>
                            <a href="{{route('dashboard')}}" class="btn btn-success mb-2" >
                              <i class="fa-solid fa-arrow-left"></i>
                              Back
                            </a>
                        </div>
                       
                </div>
                <div class="card">
                    
                    <form action="#" method="POST" enctype="multipart/form-data" id="formSubmit">
                        @csrf
                        <div class="file">
                            <div class="row" id="addimage">
                                <div class="col-md-5">
                                    <select class="form-select" aria-label="Default select example" id="info">
                                        <option selected>Open this select menu</option>
                                         @foreach($info as $info)
                                        <option value="{{$info->id}}">{{$info->user_name}}</option>
                                        @endforeach 
                                    </select>

                                    <p id="info_msg"></p>
                                </div>
                                <div class="col-md-5" >
                                    <input class="form-control image-upload" type="file"  name="image_upload[]" enctype="multipart/form-data" multiple>
                                    <p id="img_msg"></p>
                                </div>

                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success addMore" > + </button>
                                </div>
                            </div>
                    
                        </div> 
                        <button type="button" class="btn btn-primary btn-sm submit" id="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    <script>
         

        $(document).ready(function(e){

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });


            $('.addMore').click(function(){
               $('#addimage').append(`
               <div class="col-md-5 mt-3" id="addimage">
                <input class="form-control image-upload" type="file" name="image_upload[]" enctype="multipart/form-data" multiple>
                </div>`);
            })


            $('.submit').click(function () {
                event.preventDefault();
                let info_id = $('#info').val();
                
                let image_upload = new FormData();
                console.log($('.image-upload'));
                let TotalImages = $('.image-upload').length;  //Total Images
                let images = $('.image-upload'); 
               
                for (let i = 0; i < TotalImages; i++) {
                    image_upload.append('images[]', images[i].files[0]);
                }
                image_upload.append('TotalImages', TotalImages);
                image_upload.append('info_id', info_id);
              

                $.ajax({
                    method: 'POST',
                    url: '/image-upload',
                    data: image_upload,
                    contentType: false,
                    processData: false,
                    success: function (images) {
                        
                        alert('File saved successfully');
                    },
                    error: function () {
                    
                    alert('Failed to save');
                    }
                })
              
            })

            //validate
            $('.submit').click(function(){
                let info_id=$('#info').val();
             
                
                if(info_id==='Open this select menu'){
                  
                    document.getElementById("info_msg").innerHTML="Opps!You have forgot to select User Name";
                    document.getElementById("info_msg").style.color="red";
                }
                let image = $('.image-upload').val();
                if(!image){
                   document.getElementById("img_msg").innerHTML="Opps! You have forgot to select images";
                   document.getElementById("img_msg").style.color="red";
                }

              

           
            $('#formSubmit').validate({
                rules:{
                    'image_upload[]':{
                        required:true,
                    }
                },
                messages:{
                    'image_upload[]':{
                        required:"please upload the images",
                    }
                }
            });

        });

          
               
       
    })
    </script>

  </body>
</html>