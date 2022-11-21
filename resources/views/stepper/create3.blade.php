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
                <div id="example-basic">

                    <h3>User Information</h3>

                    <section data-step="0">
                        <label for="userName">User name *</label>
                        <input id="userName" name="userName" type="text">
                        <span id="name_error"></span><br>

                        <label for="password">Password *</label>
                        <input id="password" name="password" type="text">
                        <span id="password_error"></span><br>

                        <label for="confirm">Confirm Password *</label>
                        <input id="confirm" name="confirm" type="text">
                        <span id="confirm_error"></span><br>
                        <p>(*) Mandatory</p>
                    </section>


                    <h3>Contact</h3>
                    <section data-step="1">
                        <label for="phone">Phone *</label>
                        <input id="phone" name="phone" type="number" required>
                        <span id="phone_error"></span> <br>
                        <label for="email">Email *</label>
                        <input id="email" name="email" type="email" required>
                        <span id="email_error"></span>

                        <p>(*) Mandatory</p>
                    </section>

                    <h3>Finish</h3>
                    <section data-step="2">
                        <label for="checkbox">Agreed?</label>
                        <input type="checkbox" id="checkbox" value="1"> Term and conditions
                        <span id="error_checkbox"></span> <br>
                        <p>(*) Mandatory</p>
                    </section>

                </div>

                {{-- welcomeModal --}}
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
</div>

{{-- <script scr="{{asset('steps.js/js/jquery.steps.min.js')}}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="{{asset('steps/js/jquery.steps.js')}}"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

<script>
    $("#example-basic").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        enableFinishButton: true,
        onStepChanging: function (e, currentIndex, newIndex) {
            // console.log(currentIndex,newIndex)

            if (currentIndex == 0) {


                let userName = $('#userName').val()

                let password = $('#password').val()
                let confirm = $('#confirm').val()

                if (!userName) {
                    document.getElementById("name_error").innerHTML = "Name field is required!";
                    document.getElementById("name_error").style.color = "red";
                    return false;
                }

                if (!password) {
                    document.getElementById("password_error").innerHTML = "Password field is required!";
                    document.getElementById("password_error").style.color = "red";
                    return false;
                }
                if (!confirm) {
                    document.getElementById("confirm_error").innerHTML = "Confirm password field is required!";
                    document.getElementById("confirm_error").style.color = "red";
                    return false;
                }
                if (password != confirm) {
                    document.getElementById("password_error").innerHTML = "Password and confirm password are not matched !";
                    document.getElementById("password_error").style.color = "red";
                    return false;
                }

                return true;
            }


            if (currentIndex == 1) {

                let phone = $('#phone').val()
                let email = $('#email').val()
                // console.log(email)


                if (!phone) {
                    document.getElementById("phone_error").innerHTML = "Phone number is required!";
                    document.getElementById("phone_error").style.color = "red";
                    return false;
                }

                if (phone.length < 11) {
                    document.getElementById("phone_error").innerHTML = "Length has to be 11!";
                    document.getElementById("phone_error").style.color = "red";
                    return false;
                }

                if (!email) {
                    document.getElementById("email_error").innerHTML = "Email field is required!";
                    document.getElementById("email_error").style.color = "red";
                    return false;
                }


                //    currentIndex++;
                // console.log(currentIndex,newIndex)
                return true;
            }


        },

        onFinished: function (event, currentIndex) {
            if ($("#checkbox").prop('checked') === true) {
                alert("Thank you your submitting your information")
                return true;
            } else {
                document.getElementById("error_checkbox").innerHTML = "It seems your are not agreed with our terms and conditions";
                document.getElementById("error_checkbox").style.color = "red";
                // alert("You didn't agreed with our terms and conditions")
                return false;
            }
            // if(!checkbox || checkbox!=1){
            //     document.getElementById("error_checkbox").innerHTML="You didn't agree our terms and conditions";
            //     document.getElementById("error_checkbox").style.color="red";
            //     return false;
            // }
            // $('#welcomeModal').modal();
            // return true;


        },
        labels: {
            finish: "Finish",
            next: "Next",
            previous: "Previous",
        }

    })


</script>

</body>
</html>
