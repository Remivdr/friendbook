<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">	
        <title>Friends book</title>
    </head>
    <body>
        <p id="paragraph">
            <?php
                include ('Header.html');
            ?>            
            <form action="Friendsbook.php" method="post">
                <br>Name: <input type="text" name="name">
                <input type="submit">
            </form>
            <h2>My best friends:</h2>
            <?php
                $names = array();
                $filename = 'friends.txt';
                $file = fopen($filename, "r" );
                
                if ($file != false) {
                    while (!feof($file)) {
                        $friend = fgets($file);
                        if(strlen($friend) > 0){
                            array_push($names, $friend);
                        }
                    }
                } fclose($file);

                if (isset($_POST['name']) && strlen($_POST['name']) > 0) {
                    $name = $_POST['name'];
                    $file = fopen( $filename, "a" );
                    if($file != false) {
                        fwrite( $file, $name . "\n" );
                       array_push($names, $name);
                        fclose($file);
                    }
                }
                echo "<ul>";
                foreach ($names as $key){

                if (isset($_POST['nameFilter']) && strlen($_POST['nameFilter']) > 0) {
                    $nameFilter = $_POST['nameFilter'];
                    if(strstr($key, $nameFilter)){
                        echo "<li>$key</li>";
                    }
                    }
                    else{
                        echo "<li>$key</li>";
                    }
                }


                echo "</ul>";   
            ?>
            <form action="Friendsbook.php" method="post">
                <br><input type="text" name="nameFilter">
                <input type ="submit">
             </form>
            <?php
                echo "<br>";
                include ('Footer.html');
            ?>
        </p>
    </body>
</html>
