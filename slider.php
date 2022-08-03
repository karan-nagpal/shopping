    <style>
        .slidercontainer-slide{
    margin:0px;
    display: flex;
    overflow: hidden;
    padding: 0;
    border-radius: 10px;
    
      
}
#slider{
    transition: 2s;
    
}
#slider img{
    padding: 0;
    margin: 0;    
    width: 100%;
    transition: 2s;
      
}
.sliderbtn{
    position: absolute;
    opacity: 50%;
   
}
.sliderfa{
    background: transparent;
    font-size: 35px;
 }
.sliderfa:hover{
    background: transparent;
    color: grey;
}
#next{
    top: 50%;
    position: absolute;
    color: lightgray;
   
}
#prev{
    position: absolute;
    top:50%;
    right: 0;
    color: lightgray;
  
}
.sliderbtn:hover{
    opacity: 100%;
}

.sliderradiopanel{
    position: absolute;
    top: 90%;
    width: 100%;
    text-align: center;
}
.sliderradiopanel input{
    opacity: 20%;
    margin-left: 15px;
}
.sliderradiopanel input:hover{
    opacity: 100%;
    transform: scale(1.5);
}
    </style>
    <div class="col-md-12 slidercontainer-slide mb-3" style="padding:0">
        <div class=" col-md-12 slidercontainer-slide img-responsive" id="slider" style="max-height:400px; overflow:hidden">
            <img src="sliderimages/1.png" alt="imag" >
            <img src="sliderimages/2.jpg" alt="imag" >
            <img src="sliderimages/3.jpg" alt="imag" >
            <img src="sliderimages/4.jpg" alt="imag" >
            <img src="sliderimages/5.jpg" alt="imag" >
            
            
            <span id="prev"><i class="fa fa-arrow-right sliderfa" ></i></span>
            <span id="next"><i class="fa fa-arrow-left sliderfa" ></i></span>
        <div class="sliderradiopanel" id="radioDiv">             
        </div>
           
        </div>   
    </div>
    <script src="script/slider.js"></script>
