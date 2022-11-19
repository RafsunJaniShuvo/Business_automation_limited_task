<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{asset('css/style_2.css')}}">
  <title>Step Progress Bar | JavaScript</title>
</head>
<body>
    <div class="container">
      <h1>Step Progress Bar</h1>
      <div class="progress-container">
        <div class="progress" id="progress"> </div>
          <div class="circle ">
            <i class="fab fa-html5"></i>
          </div>
          <div class="circle ">
            <i class="fab fa-css3-alt"></i>
          </div>
          <div class="circle ">
            <i class="fab fa-js"></i>
          </div>
          <div class="circle">
            <i class="fab fa-react"></i>
          </div>
      
       
      </div>
    
      {{-- User Info --}}
      <div class="container">
        <div class="row ">
          <div class="card dflex justify-content-center">
            <div class="col-md-10">
            <h1>User Info</h1>
              <div class="input-group">
                <label for="username" class="mt-2">First Name </label>
                <input type="text" id="username" name="username" class="form-control">
              </div>
              <div class="input-group">
                <label for="username" class="mt-2">Last Name </label>
                <input type="text" id="username" name="username" class="form-control">
              </div>
              <button class="btn" id="prev" disabled>Prev</button>
              <button class="btn" id="next" >Next</button>
            </div>
          </div>
        </div>
      </div>

      {{-- Contact Info --}}

      <div class="container">
        <div class="row my-3">
          <div class="card dflex justify-content-center">
            <div class="col-md-10">
            <h1>Contact Info</h1>
              <div class="input-group">
                {{-- <label for="username" class="mt-2">Email</label> --}}
                Email:
                <input type="email" id="username" name="username" class="form-control mb-2">
              </div>
              <div class="input-group">
                {{-- <label for="username" class="mt-2"> Phone </label> --}}
                Phone:
                <input type="number" id="username" name="username" class="form-control">
              </div>
              <div></div>
              <button class="btn" id="prev" >Prev</button>
              <button class="btn" id="next" >Next</button>
            </div>
          </div>
        </div>
      </div>

    
    </div>   
      
   


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
 let progress = document.getElementById("progress");
 const prev = document.getElementById("prev");
 const next = document.getElementById("next");
 const circle = document.querySelectorAll(".circle");
//  console.log(circle.length)
 let currentActive = 0;
 next.addEventListener("click",()=>{
  currentActive++;

  if(currentActive>circle.length){

    currentActive=circle.length;
  }
  update();
 
 });


 prev.addEventListener("click",()=>{
  currentActive--;
  if(currentActive<1){
    currentActive = 1;
  }
  update();
  
 })

 function update(){
  circle.forEach((circle,idx)=> {
    if(idx<currentActive){
      circle.classList.add("active");
    }else{
      circle.classList.remove("active");
    }
  });
  const actives = document.querySelectorAll(".active");
  progress.style.width = ((actives.length-1)/(circle.length-1))*100+"%";
  if(currentActive==1){
    prev.disabled=true;

  }else if(currentActive==circle.length){
    next.disabled=true;
  }else{
    prev.disabled=false;
    next.disabled=false;
  }
 }
 
 
 </script>

</body>
</html>