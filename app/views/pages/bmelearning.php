<?php
include_once "../app/views/partial/header.php";
?>


<div class="topimage">
  <img src="<?=PATH?>images/equipmentlearning/biomedicalequipmentlearning.jpg" width="100%">
</div>

<style>
.filterDiv {
 
  color: #ffffff;
  line-height:80px;
  margin: 3px;
  display: none;

}


.show {
  display: block;
}


/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #66cc00;
  cursor: pointer;
}

.btn:hover {
  background-color: #66cc00;
}

.btn.active {
  background-color: #006687;
  color: white;
}
</style>

<br>
<center>
<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')">All Post</button>
  <button class="btn" onclick="filterSelection('cars')"> Biomedical Equipment</button>
  <button class="btn" onclick="filterSelection('animals')"> Electronics</button>
  <button class="btn" onclick="filterSelection('fruits')"> Microcontroller</button>
  <button class="btn" onclick="filterSelection('colors')"> Computer</button>
</div>
    
</center>



<!-- details card section starts from here -->
<section class="details-card">
<div class="container">
  <div class="filterDiv cars">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="<?=PATH?>images/equipmentlearning/defaibelator.jpg" alt="">
                        <span><h4>
Defibrillators</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Function of 
Defibrillators</h3>
                        <p style="font-size: 13.5px;">একটি ডিফিব্রিলিটর রোগীর বুকে নিয়ন্ত্রিত বৈদ্যুতিক শক সরবরাহ করে একটি বিশাল হার্ট অ্যাটাকের অনিয়র্ডিনেটেড হার্ট বিটগুলি বন্ধ করতে ব্যবহার করা হয়।</p>


                                <a href="#" class="btn-card" data-toggle="modal" data-target="#post1">Read More</a>
                             <!-- Post Discription -->
  <div class="modal fade" id="post1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Function of 
Defibrillators</h3>
        </div>
        <div class="modal-body">
            <h3>
               ডিফিব্রিলিটর..? 
            </h3>
            <p>
                একটি ডিফিব্রিলিটর রোগীর বুকে নিয়ন্ত্রিত বৈদ্যুতিক শক সরবরাহ করে একটি বিশাল হার্ট অ্যাটাকের অনিয়র্ডিনেটেড হার্ট বিটগুলি বন্ধ করতে ব্যবহার করা হয়।
            </p>

             <img src="<?=PATH?>images/equipmentlearning/de/Shock-ecg.jpg" width="100%">
             <p>
                 ডিফিব্রিলিটর একটি পোর্টেবল ডিভাইস যা মেইন ভোল্টেজ এবং অভ্যন্তরীণ ব্যাটারিতে চালিত হয়। ইউনিটে একটি স্থায়ী হাই ভোল্টেজ উত্স, একটি ইসিজি, ইসিজি জন্য প্রিন্টার এবং রোগী ইলেক্ট্রোড (প্যাডলস) থাকে। আধুনিক ডিফিব্রিলেটরগুলি রোগীর অবস্থার একটি সম্পূর্ণ বিশ্লেষণ করে এবং স্বয়ংক্রিয়ভাবে প্যারামিটারগুলিকে ধাক্কা দেয়।
Defibrillators বেশিরভাগ অপারেটিং রুম, জরুরী বিভাগ এবং নিবিড় যত্ন ইউনিট (আইসিইউ) ব্যবহার করা হয়।
             </p>
             <img src="<?=PATH?>images/equipmentlearning/de/Defiibrillator.jpg" width="100%">

<p>
    একটি ডিফিব্রিলিটর উন্নয়নশীল দেশগুলিতে খুব বেশি সাধারণ হয় না। হয় হাসপাতালে কোনও ডিফিব্রিলেটর নেই বা ডিফিব্রিলিটর কাজ করে না। Defibrillator সম্ভবত ডিভাইস যা সর্বাধিক ত্রুটিযুক্ত। এর কারণ হ'ল চিকিত্সক কর্মীরা খুব কমই কোনও ডিফিব্রিলিটর সম্পর্কে সঠিকভাবে প্রশিক্ষিত হন এবং তারা ধরে নেন যে সরঞ্জামগুলি বিপজ্জনক (যা সম্পূর্ণ ভুল নয়)। এবং যেহেতু ডিফিব্রিলিটর খুব কম ব্যবহার করা হয় এটি অপারেশনাল অবস্থায় রাখা হয় না।
</p>
<h3>
Defibrillation    
</h3>
<p>

যখন হার্ট বেহালার সাথে সংহত না হয় বা খুব দ্রুত তা দ্রুত কার্যকরভাবে রক্ত ​​পাম্প করতে পারে না। কার্ডিয়াক আউটপুট এবং রক্তচাপ বিপজ্জনক স্তরে পড়ে। এই পরিস্থিতি প্রাণঘাতী এবং তাত্ক্ষণিক পদক্ষেপ নিতে হবে। কয়েক মিনিটের মধ্যেই মৃত্যু বা অপরিবর্তনীয় মস্তিষ্কের ক্ষতি অন্যথায় ফলাফল হয়।
Defibrillation হ'ল চিকিত্সা যা হৃদয়কে শক্তিশালী, সংক্ষিপ্ত বৈদ্যুতিক শক প্রয়োগ করে অস্বাভাবিক হার্টের ছন্দ বন্ধ করতে পারে। শকটি হৃৎপিণ্ডের কোষগুলির অনিয়ন্ত্রিত ক্রিয়াকলাপকে বাধাগ্রস্ত করে, কোষগুলি অবনমিত হয় এবং হৃদয়ের অস্বাভাবিক ছন্দ বন্ধ হয়ে যায়। তখন হৃদয় নিজেকে নিয়ন্ত্রণ করতে সক্ষম হয় যাতে এটি আবার স্বাভাবিকভাবে বীট করে।
হৃদয়ের পুনঃসূচনা হৃদয় থেকেই আসে; একটি ডিফিব্রিলেটর একটি হার্ট শুরু করতে পারে না যা মারছে না। এটি কেবল অনিয়ন্ত্রিত মারধর বন্ধ করে দেয়। এটি হৃদয় পুনরায় সেট।

হার্টের একটি অসংরক্ষিত আন্দোলনকে ভেন্ট্রিকুলার ফাইব্রিলেশন বলা হয় ।
একটি সমন্বিত তবে খুব দ্রুত হার্টের আন্দোলনকে ভেন্ট্রিকুলার ট্যাচিকার্ডিয়া বলে ।
</p>
<br>
 <img src="<?=PATH?>images/equipmentlearning/de/1_Normal_ECG.jpg" width="100%">
<p>
  সাধারণ ইসিজি
    
</p>
 <img src="<?=PATH?>images/equipmentlearning/de/2_Ventricular_Tachycardia.jpg" width="100%">
<p>
   
        ভেন্ট্রিকুলার টাচিকার্ডিয়া
    
    
</p>
 <img src="<?=PATH?>images/equipmentlearning/de/3_Ventricular_Fibrillation.jpg" width="100%">
<p>
 ভেন্ট্রিকুলার ফাইব্রিলেশন 
   
</p>
<p>
    
ডিফিব্রিলেশন হ'ল কার্ডিওপ্লমোনারি রিসিসিটেশন (সিপিআর) জরুরী পদ্ধতির অংশ। এটি বুকের সংক্ষেপণ এবং কৃত্রিম বায়ুচলাচলের সাথে একসাথে প্রয়োগ করা হয়।

</p>
<h3>
Defibrillator প্রকার
    
</h3>
<p>
   ক্লিনিকাল ব্যবহারের জন্য বাহ্যিক ডিফিব্রিলিটর ম্যানুয়াল এবং সিঙ্ক্রোনাইজড ডিফিব্রিলিটর হিসাবে উপলব্ধ। এই ধরণের পাশাপাশি অ-ক্লিনিকাল ব্যবহার এবং ইমপ্লান্টড ডিফিব্রিলিটরগুলির জন্য সম্পূর্ণ স্বয়ংক্রিয় ডিফিব্রিলিটর (এইডি) রয়েছে।
প্রযুক্তিগত দৃষ্টিকোণ থেকে বাহ্যিক ডিফিব্রিলেটরগুলি মনোফাসিক এবং বিফাসিক ডিফিব্রিলিটরগুলির মধ্যে পার্থক্য করা হয় , যা শক স্পন্দনের তরঙ্গরূপকে বর্ণনা করে। উন্নত বিশ্বে আজকাল কেবল বাইফাসিক ডিফিব্রিলিটর পাওয়া যায়; উন্নয়নশীল দেশগুলিতে পুরানো মনোফাসিক সংস্করণ এখনও সবচেয়ে সাধারণ ধরণ।
অভ্যন্তরীণ ইসিজি ইউনিটটি সঠিক মুহুর্তে শক পালসটি ট্রিগার করতে ব্যবহার করা যেতে পারে। এই জাতীয় সিঙ্ক্রোনাইজড ডিফিব্রিলেশনকে কার্ডিওভারসনও বলা হয় । 
</p>





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
                         
                           
                    </div>
                </div>
            </div>
  </div>

  <div class="filterDiv colors fruits">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="<?=PATH?>images/equipmentlearning/ecgcircuit.jpg" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>
                           
                    </div>
                </div>
            </div>
  </div>

  <div class="filterDiv cars">
  <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                       <img src="<?=PATH?>images/equipmentlearning/ecgcircuit.jpg" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>
                           
                    </div>
                </div>
            </div>
  </div>
  <div class="filterDiv colors">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                      <img src="<?=PATH?>images/equipmentlearning/ecgcircuit.jpg" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>
                           
                    </div>
                </div>
            </div>
  </div>
  <div class="filterDiv cars animals">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                       <img src="<?=PATH?>images/equipmentlearning/ecgcircuit.jpg" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>
                           
                    </div>
                </div>
            </div>
  </div>
  <div class="filterDiv colors">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                       <img src="<?=PATH?>images/equipmentlearning/ecgcircuit.jpg" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>
                           
                    </div>
                </div>
            </div>
  </div>
  <div class="filterDiv animals">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                       <img src="<?=PATH?>images/equipmentlearning/ecgcircuit.jpg" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>
                           
                    </div>
                </div>
            </div>
  </div>
  <div class="filterDiv animals">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                       <img src="<?=PATH?>images/equipmentlearning/ecgcircuit.jpg" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>
                           
                    </div>
                </div>
            </div>
  </div>
  <div class="filterDiv fruits">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="<?=PATH?>images/equipmentlearning/ecgcircuit.jpg" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>
                           
                    </div>
                </div>
            </div>
  </div>
  <div class="filterDiv fruits animals">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                      <img src="<?=PATH?>images/equipmentlearning/ecgcircuit.jpg" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>
                           
                    </div>
                </div>
    
  </div>
</div>
  <div class="filterDiv fruits">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="<?=PATH?>images/equipmentlearning/ecgcircuit.jpg" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>
                           
                    </div>
                </div>
            </div>
 
  </div>
  <div class="filterDiv fruits">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                       <img src="<?=PATH?>images/equipmentlearning/ecgcircuit.jpg" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                                             <a href="#" class="btn-card" data-toggle="modal" data-target="#myModal">Read More</a>
                             <!-- Post Discription -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>By Name is Nur Mohammad</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
                           
                    </div>
                </div>
  </div>
</div>
  <div class="filterDiv animals">

            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="<?=PATH?>images/equipmentlearning/ecgcircuit.jpg" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>

                            <a href="#" class="btn-card" data-toggle="modal" data-target="#post1">Read More</a>
                             <!-- Post Discription -->
  <div class="modal fade" id="post1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



                           
                    </div>
                </div>
            </div>
  </div>
</div>




</section>
<!-- details card section starts from here -->


<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>










 

  








<?php
include_once "../app/views/partial/footer.php";
?>