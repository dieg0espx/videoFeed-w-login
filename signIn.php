<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<?php include "header.html" ?>
    
        <div class="grid-form">
            <div id="left">
                <h3> SIGN IN </h3>
                <h2> Video <br> News Feed </h2>
                <p> Quickly and Comprehensively Keep Up With The Latest Insights. </p>
                <a href="signUp.php"> Not registred? Sign Up. </a>
            </div>
            <div id="right">
                <form action="#">
                    <p class="fieldTitle"> EMAIL ADDRESS </p>
                    <input id="txt_email" type="email" name="email" placeholder="client.mailaddress@example.com" required>
                    
                    <p class="fieldTitle"> PASSWORD </p>
                    <input id="txt_password" type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>

    
    <script src="signIn.js"></script>

<?php
function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}

function checkCredentials($email, $pass){
    include 'connection.php';
    $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
    $registros = mysqli_query($conexion, "SELECT * FROM users") or die("Problemas en el select:" . mysqli_error($conexion));
    while ($reg = mysqli_fetch_array($registros)) {
       if($email == $reg['email'] && $pass ==  $reg['password']){
        echo '<script type="text/javascript">','window.location.replace("feed.php");','</script>';
       }
    }
}

if( isset($_REQUEST['email']) && isset($_REQUEST['password'])){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    checkCredentials($email, $password);
}
?>

<?php include "footer.html" ?>
</body>
</html>

