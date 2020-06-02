  let scr = window.location.origin+"/images/slider/";

  var slider = document.getElementById("slider");
  var dptName = slider.children[0].children[0].children[0].attributes[0];
  var catList = slider.children[2].children[0].children[0].attributes[0];
  var dptImage = slider.children[2].children[2].children[0].children[0].attributes[0];
  var shopNow = slider.children[2].children[2].children[3].children[1].children[0].attributes[0];
  //dptName.nodeValue = scr+"med.png";
  

  $.get( window.location.protocol+"//"+window.location.hostname+"/api/get_dpt", function( data ) {
    if(data){

      let dpt = JSON.parse(data)["dpt"];

      // dpt.forEach(function(data){

        
      //   console.log(data.slug);
      //   changeSlide(data.slug);

      // });


        var i = 1;                     //  set your counter to 1

        function myLoop () {           //  create a loop function
           setTimeout(function () {    //  call a 3s setTimeout when the loop is called
              //alert('hello');
              changeSlide(dpt[i]);          //  your code here
              i++;
              if(i==(dpt.length-1)){
                i = 0;
              }                     //  increment the counter
                      //  if the counter < 10, call the loop function
                 myLoop();             //  ..  again which will trigger another 
                                   //  ..  setTimeout()
           }, 15000)
        }

      myLoop(); 




      
      }
    });

  function changeSlide(dpt){
    let slug = dpt.slug;
    //console.log($( "#dptName" ).fadeOut(4000));
    $( "#dptName" ).fadeOut();
    $( "#catNames" ).fadeOut();
    $( "#dptImage" ).fadeOut();
    $( "#shopNow" ).fadeOut();

    dptName.nodeValue = scr+slug+".png";
    catList.nodeValue = scr+slug+"Cat.png";
    dptImage.nodeValue = scr+slug+"Image.png";
    shopNow.nodeValue = window.location.protocol+"//"+window.location.hostname+"/ui/departments/"+dpt.id;
    $( "#dptName" ).fadeIn(4000);
    $( "#catNames" ).show(4000);
    $( "#dptImage" ).fadeIn(4000);
    $( "#shopNow" ).show(5000);
    //alert("hello");
    
  }
  
  
