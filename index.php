<?php


?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            margin: 40vh 0vh;
            text-align: center;
        }

        .button{
            padding: 10px 15px;
            background-color: darkorange;
            color: white;
            border: none;
            font-weight: bolder;
            border-radius: 5px;
        }
        .button:hover{
            background-color: orangered;
        }
    </style>
</head>
<body>

    <form action="convert.php" method="post" enctype="multipart/form-data">
        <h1>Select html file to Convert to PDF</h1>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input class="button" type="submit" value="Convert to PDF" name="submit">
    </form>

</body>

</html>