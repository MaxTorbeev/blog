<html>
<head>
    <meta charset="UTF-8">
    <title>Image Upload</title>
    <script type="text/javascript" src="/editor/plugins/imageupload/imageUpload.js"></script>
    <script type="text/javascript">
        window.parent.window.ImageUpload.uploadSuccess({
            code : '<?php echo $file_path; ?>'
        });
    </script>
    <style type="text/css">
        img {
            max-height: 240px;
            max-width: 320px;
        }
    </style>
</head>
<body>
<p>
    <img src="<?php echo $file_path ?>" alt="">
</p>
</body>
</html>