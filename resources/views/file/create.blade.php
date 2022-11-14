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
            <div class="col-md-6">

            <div class="card-header">
                <h1 align ="center">File </h1>
            </div>
            <div class="card">
                <form action="#" method="POST" id="multi-file-upload-ajax" enctype="multipart/form-data" id="formSubmit">

                    @csrf
                        <div class="card">
                            <div class="mb-3">
                                <input type="file" id="image-upload" name="image_upload[]" enctype="multipart/form-data" multiple>
                            </div>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary" id="submit">Submit</button>
                        </div> 
                </form>
            </div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
         

        $(document).ready(function(e){

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $('#image-upload').change(function () {
                event.preventDefault();
                let image_upload = new FormData();
                // console.log(image_upload)
                let TotalImages = $('#image-upload')[0].files.length;  //Total Images
                let images = $('#image-upload')[0]; 
                for (let i = 0; i < TotalImages; i++) {
                    image_upload.append('images[]', images.files[i]);
                }
                image_upload.append('TotalImages', TotalImages);
                // console.log(image_upload)

                $.ajax({
                    method: 'POST',
                    url: '/image-upload',
                    data: image_upload,
                    contentType: false,
                    processData: false,
                    success: function (images) {
                        // console.log(`ok ${images}`)
                        alert('File saved successfully');
                    },
                    error: function () {
                    // console.log(`Failed`)
                    alert('Failed to save');
                    }
                })
              
            })
       
    })
    </script>
  </body>
</html>