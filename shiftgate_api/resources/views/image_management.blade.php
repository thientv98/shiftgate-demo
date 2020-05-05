<?php
    $time = time() + (86400 * 30);
    setcookie('IsAuthorizedFolder', $_GET['folder'], $time, "/");
?>
<html>
<head>
    <meta charset="utf-8">
    <title>CKFinder 3 Samples</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lt IE 9]>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{asset('js/ckfinder/samples/js/html5shiv.min.js')}}"></script>
    <link href="{{asset('js/ckfinder/samples/css/sample.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/prettify.css">
</head>

<body cz-shortcut-listen="true">
<main class="grid-container">
    <section class="content grid-width-70">
        <div class="modal-example">
            <button id="ckfinder-modal" class="button-a button-a-background" style="float: left; display: none">Open
                Modal
            </button>
            <button id="copy_button" onclick="copyUrl()" class="button-a button-a-background" style="float: left; display: none">Copy File Url</button>
            <div id="output" style="float: left;font-size: 0.8em;line-height: 1.4em;margin: 3px 7px;">
                <span id="file-name"></span>
                <br>
                <span id="file-url"></span>
            </div>
        </div>
        <div style="clear: both"></div>
    </section>
</main>

<script src="{{asset('js/ckfinder/samples/js/sf.js')}}"></script>
<script src="{{asset('js/ckfinder/samples/js/tree-a.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ckfinder/ckfinder.js')}}"></script>
<script>CKFinder.config({connectorPath: "{{env('APP_URL') ? env('APP_URL') : url('')}}" +"/ckfinder/connector"});</script>
<script>
    $(document).ready(function () {
        $(function () {
            $("#ckfinder-modal").trigger("click");
        });
    });

    var button = document.getElementById('ckfinder-modal');
    button.onclick = function () {
        CKFinder.modal({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();
                    var copyBtn = document.getElementById('copy_button');
                    // var outputFileName = document.getElementById('file-name');
                    var outputFileUrl = document.getElementById('file-url');
                    // outputFileName.innerText = 'Selected: ' + file.get('name');
                    outputFileUrl.innerText = file.getUrl();
                    copyBtn.click();
                });

                finder.on('file:choose:resizedImage', function (evt) {
                    var outputFileName = document.getElementById('file-name');
                    var outputFileUrl = document.getElementById('file-url');
                    outputFileName.innerText = 'Selected resized image: ' + evt.data.file.get('name');
                    outputFileUrl.innerText = 'URL: ' + evt.data.resizedUrl;
                });
            }
        });
    };

    function copyUrl() {
        let baseUrl = "<?php echo url('')?>";
        let copyText = document.getElementById("file-url");
        let textArea = document.createElement("textarea");
        textArea.value = baseUrl + copyText.textContent;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand("Copy");
        textArea.remove();
        alert('画像のURLがコピーされました。CTRL+ Vを使用して貼り付けてください');
        window.close()
    }

    // var button1 = document.getElementById('ckfinder-modal-1');
    // var button2 = document.getElementById('ckfinder-modal-2');
    //
    // button1.onclick = function () {
    //     selectFileWithCKFinder('ckfinder-input-1');
    // };
    // button2.onclick = function () {
    //     selectFileWithCKFinder('ckfinder-input-2');
    // };

    function selectFileWithCKFinder(elementId) {
        CKFinder.modal({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();
                    var output = document.getElementById(elementId);
                    output.value = file.getUrl();
                });

                finder.on('file:choose:resizedImage', function (evt) {
                    var output = document.getElementById(elementId);
                    output.value = evt.data.resizedUrl;
                });
            }
        });
    }
</script>
</body>
</html>