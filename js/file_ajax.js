$(function(e){
    
    $.ajax({    
      type: "GET",
      url: "data.php",            
      dataType:  "html",                  
      success: function(data){   
          //console.log({data})          
         $("#table-container").html(data); 
        
         
        var checkbox = document.getElementsByName("module_name");
        console.log({checkbox})
        for(var i=0;i<checkbox.length;i++){
            checkbox[i].addEventListener('change', function() {
                if (this.checked) {
                    $.ajax({
                        url:"crud/insert.php",
                        type:"POST",
                        data: {
                            modules: [{ 'user_id':this.id, 'module':this.value}]
                        },
                      success: function(data){
                        console.log({data});
                          alert(data);
                          
                         // window.location.reload();
                      }

                    })
                  console.log("Checkbox is checked.." + this.id);
                } else {
                    $.ajax({
                        url:"crud/delete.php",
                        type:"POST",
                        data: {
                            modules: [{ user_id:this.id, module:this.value }]
                        },
                        success: function(data){
                            console.log({data});
                            alert(data)
                        }

                    })
                  console.log("Checkbox is not checked.." + this.value);
                }
              });
        }
        
      }
  });
})

// checkbox.addEventListener('change', function() {
//     console.log(checkbox)
//   if (this.checked) {
//     console.log("Checkbox is checked..");
//   } else {
//     console.log("Checkbox is not checked..");
//   }
// });
//     $.ajax({    
//       type: "POST",
//       url: "data.php",            
//       dataType:  "html",                  
//       success: function(data){   
//           console.log({data});                 
//          $("#table-container").html(data); 
        
         
//       }
//   });
