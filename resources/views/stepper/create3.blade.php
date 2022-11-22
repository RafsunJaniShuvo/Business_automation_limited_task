<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/jquery.steps.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Step Js</title>
</head>
<body>

<div class="container" style="margin-top:10px;">
    <div class="card">
        <div class="card-header bg-success text-white">
            Information form by Stepper JS
        </div>
        <div class="card-body">
            <form action="#" id="profileForm">


                    <h3>User Information</h3>

                    <section data-step="0">
                        <label for="userName">User name *</label>
                        <input id="userName" name="userName" type="text"  class="form-control required" >


                        <label for="password">Password *</label>
                        <input id="password" name="password" type="password" class="form-control required">


                        <label for="confirm">Confirm Password *</label>
                        <input id="confirm" name="confirm" type="password" class="form-control required">

                        <p>(*) Mandatory</p>
                    </section>


                    <h3>Contact</h3>
                    <section data-step="1">
                        <label for="phone">Phone *</label>
                        <input id="phone" name="phone" type="number" class="form-control required"   >
                        <span id="phone_error"></span> <br>
                        <label for="email">Email *</label>
                        <input id="email" name="email" type="email" class="form-control required" >
                        <span id="email_error"></span>

                        <p>(*) Mandatory</p>
                    </section>

                    <h3>Finish</h3>
                    <section data-step="2">
                        <label for="checkbox">Agreed?</label>
                        <input type="checkbox" id="checkbox" value="1" > Term and conditions
                        <span id="error_checkbox"></span> <br>
                        <p>(*) Mandatory</p>
                    </section>

                </div>


                <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Welcome</h4>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">Thanks for signing up</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

</div>

{{-- <script scr="{{asset('steps.js/js/jquery.steps.min.js')}}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="{{asset('steps/js/jquery.steps.js')}}"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

<script>
    var form = $('#profileForm');

        form.validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        })


    form.steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            alert("Submitted!");
        }


    })


</script>

</body>
</html>
