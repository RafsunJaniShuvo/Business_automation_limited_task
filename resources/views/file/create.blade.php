<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
  <body>
    


    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-10">

            <div class="card-header">
                <h1 align ="center">File </h1>
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
                <button type="button" class="btn btn-primary btn-sm col-md-3 mt-3 submit" id="submit" >Submit</button>
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
                // console.log(info_id)
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