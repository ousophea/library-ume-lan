<html>
    <head>

    </head>
    <body>

        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>

        <!-- place in header of your html document -->
        <script>
            tinymce.init({
                selector: "textarea.tinyMCE",
                theme: "modern",
                external_filemanager_path:'tinymce/js/tinymce/plugins/filemanager/',
                width: 680,
                height: 300,
                subfolder: "",
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons paste textcolor filemanager"
                ],
                image_advtab: true,
                toolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect forecolor backcolor | link unlink anchor | image media | print preview code"
            });
        </script>

        <!-- place in body of your html document -->
        <textarea class="tinyMCE" name="area"></textarea>
    </body>
</html>