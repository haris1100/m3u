<section class="pricing py-5" id="pricing" style="background-color: rgb(195, 241, 255)">
    <div class="container text-center">
        <h1><b>PRICING</b></h1><br><br>
        <div class="row" id="appendCards">
            <!-- Free Tier -->
        </div>
    </div>
</section>
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
                    var price=response[i]['rate']/12;
                    price= Math.round(price);
                    var card = "<div class=\"col-lg-4 \">\n" +
                    "                <div class=\"card mb-5 mb-lg-0\">\n" +
                    "                    <div class=\"card-body "+classbg+" text-white\">\n" +
                    "                        <h5 class=\"card-title  text-uppercase text-center \" style=\"font-size: 20px\">"+response[i]['cardName']+"</h5>\n" +
                    "                        <h6 class=\"card-price text-capitalize\">"+price+"$</h6>\n" +
                    "                        <p class=\"text-sm-left form-control-sm\">Billed annually. Or "+response[i-3]['rate']+"$ with monthly billing.</p>\n" +
                    "                        <hr>\n" +
                    "                        <ul class=\"fa-ul\">\n" +
                    "                            <li class=\"text-left\" style=\"font-size:18px\">Playlists: &nbsp;&nbsp;"+response[i]['maxPlayList']+"</li>\n" +
                    "                            <li class=\"text-left\" style=\"font-size:18px\">Channels per playlist: "+response[i]['channelPerPlayList']+"</li>\n" +
                    "                            <li class=\"text-left\" style=\"font-size:18px\">URL customization: "+response[i]['DownloadURLcustomization']+"</li>\n" +
                    "                            <li class=\"text-left\" style=\"font-size:18px\"></span>Daily sync for updates: "+response[i]['Dailysyncforupdates']+"</li>\n" +
                    "                            <br>\n" +
                    "                            <br>\n" +
                    "                            <br>\n" +
                    "                        </ul>\n" +

                    "                    </div>\n" +
                    "                </div>\n" +
                    "            </div>";
                    $('#appendCards').append(card);
            }

            }
        });
    }
</script>
