<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>shpp-library</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="library Sh++">
    <link rel="stylesheet" href="<?php echo strpos($_SERVER['REQUEST_URI'], "book/") ? "../public" : "public"?>/css/libs.min.css">
    <link rel="stylesheet" href="<?php echo strpos($_SERVER['REQUEST_URI'], "book/") ? "../public" : "public"?>/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" crossorigin="anonymous"/>

    <style>
        .details {
            display: none;
        }
    </style>
</head>
<body>
<?php include 'application/views/header_view.php'; ?>
<?php include 'application/views/'.$content_view; ?>
<?php include 'application/views/footer_view.php'; ?>
</body>
</html>