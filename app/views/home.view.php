<?php $this -> view("header", $info);
    // echo "<br>" . $_SERVER['SERVER_PROTOCOL'] . "<br>";
    // print_r(strtolower(explode('/', $_SERVER['SERVER_PROTOCOL'])[0]));
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>" . "REMOTE_ADDR>>>>>>>> " . $_SERVER['REMOTE_ADDR'] . "<br>";
    echo "<br>" . "SERVER_NAME>>>>>>>> " . $_SERVER['SERVER_NAME'] . "<br>";
    echo "<br>" . "REMOTE_PORT>>>>>>>> " . $_SERVER['SERVER_PORT'] . "<br>";
    echo "<br>" . "ROOT>>>>>>>> " . ROOT . "<br>";
    echo "<br>" . "ASSETS>>>>>>>> " . ASSETS . "<br>";
    // // echo "<br>" . "__DIR__1  " . __DIR__ . "<br>";
    // echo "<br>" . "__DIR__2  " . str_replace( '\\', '/', __DIR__ ) . "<br>";
    // echo "<br>" . "DOCUMENT_ROOT1  " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
    // echo "<br>" . "DOCUMENT_ROOT2  " . str_replace( $_SERVER['DOCUMENT_ROOT'], "", str_replace( '\\', '/', __DIR__ ) ) . "<br>";
    // echo "<br>" . a . "<br>";
    // echo "<br>" . strtolower(explode('/', $_SERVER['SERVER_PROTOCOL'])[0]) . "://" . $_SERVER['REMOTE_ADDR'] . __DIR__ . "<br>";
    // echo "<br>" . strtolower(explode('/', $_SERVER['SERVER_PROTOCOL'])[0]) . "://" . $_SERVER['REMOTE_ADDR'] . str_replace( "app/views", "public", str_replace( '\\', '/',str_replace( $_SERVER['DOCUMENT_ROOT'], "", str_replace( '\\', '/', __DIR__ ) ) ) ) . "<br>";
    // echo "<br> ROOT  " . ROOT . "<br>";
    // echo "<br> ROOT2  " . ROOT2 . "<br>";
    // echo "<br> ASSETS  " . ASSETS . "<br>";
    // echo "<br> ASSETS2  " . ASSETS2 . "<br>";
?>
<div class="folder"></div>
<?php $this -> view("footer"); ?>