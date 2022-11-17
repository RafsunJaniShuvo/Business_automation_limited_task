<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stepper</title>
    <!-- Bootstrap 5.1 CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
    <style>
      body{
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }
    </style>
  </head>
  <body>
    
    <section>
     

        <div class="container">
          <div class="accordion" id="accordionExample">
          <div class="steps">
              <progress id="progress" value=0 max=100 ></progress>
              <div class="step-item">
                  <button class="step-button text-center" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      1
                  </button>
                  <div class="step-title">
                      First Step
                  </div>
              </div>
              <div class="step-item">
                  <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      2
                  </button>
                  <div class="step-title">
                      Second Step
                  </div>
              </div>
              <div class="step-item">
                  <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      3
                  </button>
                  <div class="step-title">
                      Third Step
                  </div>
              </div>
          </div>
          
          <div class="card">
              <div  id="headingOne">
              </div>
          
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample">
                  <div class="card-body">
                     your content goes here...
                  </div>
              </div>
          </div>
          <div class="card">
              <div  id="headingTwo">
          
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="card-body">
                      your content goes here...
                  </div>
              </div>
          </div>
          <div class="card">
              <div  id="headingThree">
          
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                  data-bs-parent="#accordionExample">
                  <div class="card-body">
                      your content goes here...
                  </div>
              </div>
          </div>
          </div>
        </div>

 
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<!-- Stepper JavaScript -->
<script>
const stepButtons = document.querySelectorAll('.step-button');
const progress = document.querySelector('#progress');

Array.from(stepButtons).forEach((button,index) => {
    button.addEventListener('click', () => {
        progress.setAttribute('value', index * 100 /(stepButtons.length - 1) );//there are 3 buttons. 2 spaces.

        stepButtons.forEach((item, secindex)=>{
            if(index > secindex){
                item.classList.add('done');
            }
            if(index < secindex){
                item.classList.remove('done');
            }
        })
    })
})
</script>
  </body>
</html>