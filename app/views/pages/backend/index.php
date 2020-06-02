<?php
include($path.'/layouts/head.php');
?>



<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function Function1() {
  document.getElementById("Dropdown1").classList.toggle("show");
}

function Function2(){
  document.getElementById("Dropdown2").classList.toggle("show");
}
function Function3(){
  document.getElementById("Dropdown3").classList.toggle("show");
}
function Function4(){
  document.getElementById("Dropdown4").classList.toggle("show");
}
function Function5(){
  document.getElementById("Dropdown5").classList.toggle("show");
}
function Function6(){
  document.getElementById("Dropdown6").classList.toggle("show");
}
function Function7(){
  document.getElementById("Dropdown7").classList.toggle("show");
}
function Function8(){
  document.getElementById("Dropdown8").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</div>
  

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-0">
          

        
        </div>
        <div class="col-md-12">
          <!-- Website Overview -->
          

          <!-- Latest Users -->
         

        </div>
      </div>
    </div>
  </section>



  <footer id="footer">
    <p>Copyright Medical Shop Bangladesh, &copy; 2019</p>
  </footer>

  <!-- Modals -->

 


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>