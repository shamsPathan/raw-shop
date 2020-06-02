







$(document).ready(function(){
   
    $("#department").on("click", function(){

                // delete all precious childs
                $("#category").empty();

                $id = parseInt($("#department").val());
                jQuery.getJSON( "/api/get_cat/"+$id).done(function(a) {
//console.clear();
                        
                        $.each(a.cat , function(index, cat){
                            console.log(cat);
                            $("#category").append( "<option value='"+cat.id+"'>"+cat.nameEN+"</option>" )
                        });
                    });
                });

                $("#category").on("click", function(){

                    // delete all precious childs
                    $("#subcategory").empty();
    
                    $id = $("#category").val();
                    console.log($id);
                    jQuery.getJSON( "/api/get_sub/"+$id).done(function(a) {
    //console.clear();
                            console.log(a);
                            $.each(a.sub , function(index, sub){
                                //console.log(id);
                                $("#subcategory").append( "<option value='"+sub.slug+"'>"+sub.nameEN+"</option>" )
                            });
                        });
                    });



})