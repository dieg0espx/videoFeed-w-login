<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('Location: signIn.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body id="feedPage">
<?php include "header.html" ?>


<h3> VIDEO NEWS FEED </h3>
<a href="logout.php"> Log Out </a>
<h2> The Power of Technology </h2>
<div class="categories">
    <p class="checkbox"> <input type="checkbox" value="1" id="categorie1" onClick="categorySeletect(1)"> Option 1 </p>
    <p class="checkbox"> <input type="checkbox" value="2" id="categorie2" onClick="categorySeletect(2)"> Option 2 </p>
    <p class="checkbox"> <input type="checkbox" value="3" id="categorie3" onClick="categorySeletect(3)"> Option 3 </p>
    <p class="checkbox"> <input type="checkbox" value="4" id="categorie4" onClick="categorySeletect(4)"> Option 4 </p>
    <p class="checkbox"> <input type="checkbox" value="5" id="categorie5" onClick="categorySeletect(5)"> Option 5 </p>
</div>
<hr>
<div class="grid-feed">

<?php
    include 'connection.php';
    $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
    $registros = mysqli_query($conexion, "SELECT * FROM videos") or die("Problemas en el select:" . mysqli_error($conexion));
    while ($reg = mysqli_fetch_array($registros)) {
        $shrtLink = explode("/", $reg['link']);
        $link = "https://www.youtube.com/embed/".$shrtLink[3];
        ?>
        <div class="row category" onClick="window.location.href= 'details.php?id=' + <?php echo $reg['id']; ?>">
            <div class="video">
                Video Goes Here <br><?php echo $reg['link']; ?>
                <!-- <iframe width="100%" height="215" src="<?php echo $link; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
            </div>
            <p class="videoTitle"> <?php echo $reg['name']; ?> </p>
            <p class="videoSrtDesc"> <?php echo $reg['shortDesc']; ?> </p>
        </div>
<?php } ?>
</div>
 <?php include "footer.html" ?>
 <script src="feed.js"></script>
</body>
</html>