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
    <!-- <div class="wrapper-signUp"> -->
        <div class="grid-form">
            <!-- LEFT SIDE -->
            <div id="left-grid-signUp">
                <h3> SIGN UP </h3>
                <h2> Video <br> News Feed </h2>
                <p> Quickly and Comprehensively Keep Up With The Latest Insights. </p>
                <a href="signIn.php"> Already have an account? Sign In. </a>
            </div>
            <div id="right-grid-signUp">
                <form action="#">
                    <p class="fieldTitle"> EMAIL ADDRESS </p>
                    <input id="txt_email" type="email" name="email" placeholder="client.mailaddress@example.com" >
                    
                    <p class="fieldTitle"> FIRST NAME </p>
                    <input id="txt_name"  type="text" name="name" placeholder="Client's Name" >
                    
                    <p class="fieldTitle"> LAST NAME </p>
                    <input id="txt_lastName" type="text" name="lastName" placeholder="Client's Last Name" >
                    
                    <p class="fieldTitle"> PASSWORD </p>
                    <input id="txt_password" type="password" name="password" placeholder="Password" >
                    
                    <p class="fieldTitle"> CONFIRM PASSWORD </p>
                    <input id="txt_confirmPassword" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" >
                    
                    <p class="fieldTitle"> PREFERENCES </p>
                    <p class="legend"> Which topics are you interested in learning about? </p>
                    <div class="checkbox">
                        <p class="checkbox"> <input type="checkbox" name="preferences[]" value="1"> Option 1 </p>
                        <p class="checkbox"> <input type="checkbox" name="preferences[]" value="2"> Option 2 </p>
                        <p class="checkbox"> <input type="checkbox" name="preferences[]" value="3"> Option 3 </p>
                        <p class="checkbox"> <input type="checkbox" name="preferences[]" value="4"> Option 4 </p>
                        <p class="checkbox"> <input type="checkbox" name="preferences[]" value="5"> Option 5 </p>
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    <!-- </div> -->
    
    <script src="signUp.js"></script>

<?php
function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}

function verifyEmailInUse($email){    
    include 'connection.php';
    $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
    $registros = mysqli_query($conexion, "SELECT * FROM users") or die("Problemas en el select:" . mysqli_error($conexion));
    while ($reg = mysqli_fetch_array($registros)) {
       if($email == $reg['email']){
        echo '<script type="text/javascript">','alert("Email Already in Use");','</script>';
        return false;
       }
    }
    return true;
}

function verifySamePasswords($p1, $p2){
    if($p1 != $p2){
        echo '<script type="text/javascript">','alert("Passwords Not Matching");','</script>';
    } else {
        return true;
    }
}

function createNewUser($myPreferences){
    console_log("Creating New User..");
    include 'connection.php';
    $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
    mysqli_query($conexion, "INSERT into users(email, name, lastName, password, preferences) values 
    ('$_REQUEST[email]', '$_REQUEST[name]', '$_REQUEST[lastName]', '$_REQUEST[password]', '$myPreferences')")or die(console_log(mysqli_error($conexion)));
    echo '<script type="text/javascript">','window.location.replace("feed.php");','</script>';
}




if( isset($_REQUEST['email']) && isset($_REQUEST['password']) && isset($_REQUEST['confirmPassword'])){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirmPassword = $_REQUEST['confirmPassword'];

    $preferences = $_GET['preferences'];
    $choosenPreferences;   
    foreach ($preferences as $preferences){ 
        $choosenPreferences .= " ".$preferences;
    }

    if(verifyEmailInUse($email) == true && verifySamePasswords($password, $confirmPassword) == true){
        createNewUser($choosenPreferences);
    }
}








 include "footer.html" ?>


</body>
</html>

