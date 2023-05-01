@extends('layout.app')
@section('main')

    <body>
        <div class="container" id="row">
          <div class="row" >
              <div class="col-md-5">
                  <input class="form-control" type="text" name="name" placeholder="Enter your name:">
              </div>
              <div class="col-md-5">
                  <input class="form-control" type="text" name="age" placeholder="Enter your age:">
              </div>
              <div class="col-md-2">
                  <span onclick="addrow()"> <i class="fa-solid fa-plus"></i> </span>
              </div>
          </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let jsoninput = {
                "name_type": "text",
                "age_type": "number",
            }
            let count = 0 ;
            function addrow() {
                count = count + 1 ;
                $.ajax(
                    {
                        type: "post",
                        data:{
                            jsoninput:jsoninput,
                            count:count,
                        },
                        url:'/dynamic/addrow',
                        success:function(response) {
                        $('#row').append(response.html);
                        },
                        failed:function(response) {
                            console.log(555);
                        }
                    },
                )
            }

            function removeRow(count)
            {
                $(`#${count}`).remove();
            }
        </script>
    </body>

@endsection
