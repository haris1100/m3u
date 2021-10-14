@include('admin.headTag')
@include('admin.header')
@include('admin.sidebar')



{{--        <!DOCTYPE html>--}}
{{--        <html>--}}

{{--        <head>--}}
{{--            <meta charset="utf-8">--}}
{{--            <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0" />--}}
{{--            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">--}}

{{--            <link rel="stylesheet" href="{{ asset('public/css/froala_editor.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/froala_style.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/plugins/code_view.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/plugins/colors.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/plugins/emoticons.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/plugins/image_manager.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/plugins/image.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/plugins/line_breaker.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/plugins/table.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/plugins/char_counter.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/plugins/video.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/plugins/fullscreen.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/plugins/quick_insert.css') }}">--}}
{{--            <link rel="stylesheet" href="{{ asset('public/css/plugins/file.css') }}">--}}

{{--            <link rel="stylesheet" href="{{ asset('public/css/themes/dark.css') }}">--}}

{{--            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">--}}

{{--            <style>--}}
{{--                body {--}}
{{--                    text-align: center;--}}
{{--                }--}}

{{--                section {--}}
{{--                    width: 81%;--}}
{{--                    margin: auto;--}}
{{--                    text-align: left;--}}
{{--                }--}}
{{--            </style>--}}
{{--        </head>--}}

{{--        <body>--}}
{{--        <form method="POST">--}}
{{--        <textarea id="editor">--}}

{{--        </textarea>--}}
{{--        </form>--}}
{{--        <script type="text/javascript"--}}
{{--                src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>--}}
{{--        <script type="text/javascript"--}}
{{--                src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/js/froala_editor.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/align.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/code_beautifier.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/code_view.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/colors.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/draggable.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/emoticons.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/font_size.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/font_family.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/image.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/file.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/image_manager.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/line_breaker.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/link.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/lists.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/paragraph_format.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/paragraph_style.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/video.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/table.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/url.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/entities.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/char_counter.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/inline_style.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/save.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/fullscreen.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/quick_insert.min.js') }}"></script>--}}
{{--        <script type="text/javascript" src="{{ asset('public/plugins/quote.min.js') }}"></script>--}}
{{--        <button id="saveButton">Save</button>--}}
{{--        <script>--}}

{{--            (function () {--}}
{{--                new FroalaEditor("#edit", {--}}
{{--                    theme: 'dark'--}}
{{--                })--}}
{{--            })()--}}


{{--            var editor = new FroalaEditor('#editor', {--}}
{{--                // Set the save param.--}}
{{--                saveParam: 'contents',--}}

{{--                // Set the save URL.--}}
{{--                saveURL: '{{url("admin/adminBlog")}}',--}}

{{--                // HTTP request type.--}}
{{--                saveMethod: 'POST',--}}

{{--                // Additional save params.--}}
{{--                saveParams: {id: 'editor',_token:'{{csrf_token()}}'},--}}

{{--                events: {--}}
{{--                    'save.before': function () {--}}
{{--                      // alert('a');--}}
{{--                    },--}}

{{--                    'save.after': function () {--}}
{{--                        alert('b');--}}
{{--                    },--}}

{{--                    'save.error': function () {--}}
{{--                        alert('c');--}}
{{--                    }--}}
{{--                }--}}
{{--            })--}}

{{--            document.querySelector('#saveButton').addEventListener("click", function () {--}}
{{--                editor.save.save();--}}
{{--            })--}}
{{--        </script>--}}
{{--        </body>--}}

{{--        </html>--}}
<div class="page-wrapper">
    <div class="container">
        <button class="btn btn-success mb-3" onclick="getValBack(1);$('#staticTextAreaId').val(1)" data-toggle="modal" data-target="#staticModal">Term of use</button>
        <button class="btn btn-success mb-3" onclick="getValBack(2);$('#staticTextAreaId').val(2)" data-toggle="modal" data-target="#staticModal">Privacy Policy</button>
        <button class="btn btn-success mb-3" onclick="getValBack(3);$('#staticTextAreaId').val(3)" data-toggle="modal" data-target="#staticModal">Refund Policy</button>
        <button class="btn btn-success mb-3" onclick="getValBack(4);$('#staticTextAreaId').val(4)" data-toggle="modal" data-target="#staticModal">About Us</button>
        <button class="btn btn-success mb-3" onclick="getValBack(5);$('#staticTextAreaId').val(5)" data-toggle="modal" data-target="#staticModal">Change Logs</button>
        <button class="btn btn-success mb-3" onclick="getValBack(6);$('#staticTextAreaId').val(6)" data-toggle="modal" data-target="#staticModal">Image Size</button>
        <div class="row" id="appenCards">
        <div class="card" style="width: 18rem;" >
            <form action="{{action('m3u@adminBlog')}}" id="uploadPic" method="post" enctype="multipart/form-data">
                @csrf
                <select class="form-control" name="optionPV" id="optionPV">
                    <option value="image">image</option>
                    <option value="video">video</option>
                </select>
            <input class="form-control" type="file" required id="image" name="image">
            <input class="form-control" type="text" required id="heading" name="heading" placeholder="Enter Heading Of Blog Here">
            <div class="card-body">
{{--                <h5 class="card-title">Type Something</h5>--}}
{{--                <link href="https://cdn.jsdelivr.net/npm/@0.8.18/dist/.min.css" rel="stylesheet">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@0.8.18/dist/.min.js"></script>--}}
                <textarea placeholder="Enter Blog Card Text" name="textAreaCustom" id="textAreaCustom" cols="30" rows="10"></textarea>
                <script src="https://cdn.tiny.cloud/1/xlvvnswhm17a6tdrdbmkxnmfcbpz06vayr0lz7u6pohs2aan/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
            </form>
        </div>

  </div></div>
</div>
  <script>
      loadCard();
      function loadCard(){
          $.ajax({
              url:'{{url("getBlog")}}',
              method:'GET',
              success:function(response){
                  for(var i =0;i<response.length;i++){
                    if(response[i].op==='image'){
                 var card="<div class=\"card ml-2\" style=\"width: 18rem;\">\n" +
                     "  <img class=\"card-img-top\" src=\""+response[i]['pv']+"\" alt=\"Card image cap\">\n" +
                     "  <div class=\"card-body\">\n" +
                     // "    <h3 class='mb-5'><u>"+response[i].heading+"</u></h3>" +
                     "    <p>"+response[i].text+"</p>" +

                     "    <button onclick=\"del("+response[i].id+")\" class=\"btn btn-primary\" style=\"position: absolute;right:    0;bottom:   0;\">Delete</button>\n" +
                     "    <button onclick=\"setExtendedTextForModel("+response[i].id+")\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\"  class=\"btn btn-success\" style=\"position: absolute;left:    0;bottom:   0;\">Data for Next Page</button>\n" +

                     "  </div>\n" +
                     "</div>";

                  }
                  else {
                    var card="<div class=\"card ml-2\" style=\"width: 18rem;\">\n" +
                     "  <video width=\"100%\"  controls>"+
                        "  <source src=\""+response[i]['pv']+"\" type=\"video/mp4\"></video>" +
                     "  <div class=\"card-body\">\n" +
                     // "    <h3 class='mb-5'><u>"+response[i].heading+"</u></h3>\n" +
                        "    <p>"+response[i].text+"</p>" +
                     "    <button onclick=\"del("+response[i].id+")\" class=\"btn btn-primary\" style=\"position: absolute;right:    0;bottom:   0;\">Delete</button>\n" +
                     "    <button onclick=\"setExtendedTextForModel("+response[i].id+")\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\"  class=\"btn btn-success\" style=\"position: absolute;left:    0;bottom:   0;\">Data for Next Page</button>\n" +
                     "  </div>\n" +
                     "</div>";
                  }
                  $('#appenCards').append(card);
                  }
              },
              error:function(){
                  toastr.error('error');
              }
          })
      }
      function del(id){
        $.ajax({
              url:'{{url("admin/delBlog")}}',
              data:{id:id,_token:'{{csrf_token()}}'},
              method:'POST',
              cache:false,
              success:function(response){
                 window.location.reload();
              },
              error:function(){
                  toasrt.error('error');
              }
          })
      }

  </script>

<div class="modal fade bd-example-modal-lg" data-keyboard="false" data-backdrop="static" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add breif Data for next page for this blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="textForNextPAgeBlogging" method="post" action="{{action('m3u@saveExtendedTextForBlog')}}">
            <div class="modal-body">

                    @csrf
                    <input type="text" hidden id="IdFortextForNextPAgeBlogging" name="IdFortextForNextPAgeBlogging">
                    <textarea  name="textAreaFortextForNextPAgeBlogging" id="textAreaFortextForNextPAgeBlogging" cols="50" rows="15"></textarea>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    function setExtendedTextForModel(id) {
        $('#IdFortextForNextPAgeBlogging').val(id);
        $.ajax({
            url:'{{url('admin/getExtendedTextForBlog')}}',
            data:{id:id,_token: '{{csrf_token()}}'},
            method:'POST',
            success:function (r) {
                tinyMCE.get('textAreaFortextForNextPAgeBlogging').setContent(r.extendedText);
            },
            error:function(){
                alert('error');
            }
        })
    }
{{--    $('#textForNextPAgeBlogging').on('submit',function (e) {--}}
{{--e.preventDefault();--}}
{{--        $.ajax({--}}
{{--            url:'{{url('admin/saveExtendedTextForBlog')}}',--}}
{{--            data:$('#textForNextPAgeBlogging').serialize(),--}}
{{--            method:'POST',--}}
{{--            success:function () {--}}
{{--               alert('added');--}}
{{--            },--}}
{{--            error:function(){--}}
{{--                alert('error');--}}
{{--            }--}}
{{--        })--}}
{{--    })--}}
    function getValBack(id) {
        $.ajax({
            url:'{{url('admin/getValBack')}}',
            data:{id:id,_token:'{{csrf_token()}}'},
            method:'POST',
            success:function(response){
                tinyMCE.get('staticTextArea').setContent(response);

            },
            error:function(){
                alert('error');
            }
        })
    }
</script>
<div class="modal fade bd-example-modal-lg" data-keyboard="false" data-backdrop="static" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add breif Data for next page for this blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{action('m3u@saveStaticData')}}" method="post">
                <div class="modal-body">

                    @csrf
                    <input type="text" hidden id="staticTextAreaId" name="staticTextAreaId">
                    <textarea class="staticTextArea" name="staticTextArea" id="staticTextArea" cols="100" rows="30"><p></p></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });

</script>
