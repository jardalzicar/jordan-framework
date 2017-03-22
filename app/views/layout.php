<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <title>JF Demo</title>
    <script src="script/jquery-1.11.3.min.js"></script>
    <script src="script/script.js"></script>
</head>
<body>

    <header>

    </header>

    <div id="content">
        <?php
            if(isset($viewFile)) require_once $viewFile;
            else if(isset($viewString)) echo $viewString;
        ?>
    </div>

    <footer>


    </footer>

</body>
</html>