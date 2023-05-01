<div id="{{$count}}" class="row" style="margin-top:10px">
    <div class="col-md-5">
        <input class="form-control" type="{{$name}}" name="name" placeholder="Enter your name:">
    </div>
    <div class="col-md-5">
        <input class="form-control" type="{{$age}}" name="age" placeholder="Enter your age:">
    </div>
    <div class="col-md-2">
        <span onclick="removeRow('{{$count}}')"> <i class="fa-solid fa-minus"></i> </span>
    </div>
</div>
