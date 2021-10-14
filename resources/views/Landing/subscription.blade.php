<section class="pricing py-5" id="pricing" >
    <div class="container text-center">
        <h1><b>PRICING</b></h1><br><br>
        <div class="row" id="appendCards">
            <!-- Free Tier -->
        </div>
    </div>

</section>
<style>
    .column {
        float: left;
        width: 40%;
        padding: 10px;
         /* Should be removed. Only for demonstration */
    }
    .columns {
        float: left;
        width: 60%;
        padding: 10px;
         /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */

</style>
<script>
    reloadCards();
    function reloadCards(){
        $.ajax({
            url:'{{url("getCards")}}',
            method:'GET',
            success:function(response){
                $('#appendCards').empty();
                for(var i=3;i<6;i++){
                    var classbg=i===4?'bg-danger':'bg-primary';
                    var btnbg=i===4? " <a  onclick=\"window.location.href='register'\" style='background-color:blue;border-width:0' class=\"btn \">Get Started</a>": " <a  onclick=\"window.location.href='register'\" style='background-color:red;border-width:0' class=\"btn btn-light\">Get Started</a>";
                    var price=response[i]['rate']/12;
                    price= Math.round(price);
                    let urlCustom=response[i]['DownloadURLcustomization']==='Yes'?"<i class=\"far fa-check-circle\"></i>":"<i class=\"fas fa-times-circle\"></i>";
                    let Dailysyncforupdates=response[i]['Dailysyncforupdates']==='Yes'?"<i class=\"far fa-check-circle\"></i>":"<i class=\"fas fa-times-circle\"></i>";
                    var card = "<div class=\"col-lg-4 \">\n" +
                    "                <div class=\"card mb-5 mb-lg-0\">\n" +
                    "                    <div class=\"card-body "+classbg+" text-white\">\n" +
                    "                        <h5 class=\"card-title  text-uppercase text-center \" style=\"font-size: 20px\">"+response[i]['cardName']+"</h5>\n" +
                    // "                        <h6 class=\"card-price text-capitalize\">"+price+"$</h6>\n" +
                    // "                        <p class=\"text-sm-left form-control-sm\">Billed annually. Or "+response[i-3]['rate']+"$ with monthly billing.</p>\n" +
                    // "                        <hr>\n" +
                        "<div class=\"row\">\n" +
                        "  <div class=\"column\">\n" +
                        "    <h1><b>"+price+".00$</b></h1>\n" +

                        "  </div>\n" +
                        "  <div class=\"columns\" >\n" +

                        "    <p style='font-size: 13px'>Billed annually. Or "+response[i-3]['rate']+"$ with monthly billing.</p>\n" +
                        "  </div>\n" +
                        "</div>"+
                    "                        <ul class=\"fa-ul\">\n" +
                    "                            <li class=\"text-left\" style=\"font-size:18px\">Playlists: &nbsp;&nbsp;"+response[i]['maxPlayList']+"</li>\n" +
                    "                            <li class=\"text-left\" style=\"font-size:18px\">Channels per playlist: "+response[i]['channelPerPlayList']+"</li>\n" +
                    "                            <li class=\"text-left\" style=\"font-size:18px\">URL customization: "+urlCustom+"</li>\n" +
                    "                            <li class=\"text-left\" style=\"font-size:18px\"></span>Daily sync for updates: "+Dailysyncforupdates+"</li>\n" +

                    "                            <br>\n" +
                    "                        </ul>\n" +
                    btnbg
                    "                    </div>\n" +
                    "                </div>\n" +
                    "            </div>";
                    $('#appendCards').append(card);
            }

            }
        });
    }
</script>
<!--  -->
