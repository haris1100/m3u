@include('Landing.headTAG')
<!-- -------------------------------------------------------Header------------------------------------------------>
@include('Landing.header')
<!-- -------------------------------------------------------main------------------------------------------------>

<!-- -------------------------------------------------------cards------------------------------------------------>
<script>
    loadCard();
    function loadCard(){
          $.ajax({
              url:'{{url("getBlog")}}',
              method:'GET',
              success:function(response){
                  for(var i =0;i<response.length;i++){
                    var str=response[i].pv;
                      var split=str.split('.');
                    if(response[i].op==='image'){
                 var card="<div class=\"card ml-5 mb-3 p-3 bg-dark text-white text-center\" style=\"width: 18rem;\">\n" +
                     "  <img  class=\"card-img-top\" src=\"./"+split[2]+".jpg\" alt=\"Card image cap\">\n" +
                     "  <div class=\"card-body\">\n" +
                     "    <h3><u>"+response[i].heading+"</u></h3>\n" +
                     "    <p class=\"card-text\">"+response[i].text+"</p>\n" +
                     "    <button onclick=\"\" class=\"btn btn-secondary\" style=\"width:100%;position: absolute; bottom:0;right:0;\">Read More</button>\n" +
                     "  </div>\n" +
                     "</div>";
                    
                  }
                  else {
                    var card="<div class=\"card ml-5 mb-3 p-3 bg-dark text-white text-center\" style=\"width: 18rem;\">\n" +
                     "  <video width=\"100%\"  controls>"+
                        "  <source src=\"./"+split[2]+".mp4\" type=\"video/mp4\"></video>" +
                     "  <div class=\"card-body\">\n" +
                     "    <h3><u>"+response[i].heading+"</u></h3>\n" +
                     "    <p class=\"card-text\">"+response[i].text+"</p>\n" +
                     "    <button onclick=\"\" class=\"btn btn-secondary\" style=\"width:100% ;position: absolute; bottom:0;right:0;\">Read More</button>\n" +
                     "  </div>\n" +
                     "</div>";
                  }
                  $('#appenCards').append(card);
                  }
              },
              error:function(){
                  toasrt.error('error');
              }
          })
      }
</script>
<br> <br>
<section class=" pt-5  pb-5" style="background-color:  rgb(25, 117, 210)">
    <div class="container">
        <div class="row ml-4" id="appenCards">

           
           
       


        
        
        </div>
    </div></section>
<!-- -------------------------------------------------------footer------------------------------------------------>
@include('Landing.footer')
</body>
</html>
<script>
$('body').on('mousedown',false);
</script>