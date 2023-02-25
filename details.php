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
<?php include 'header.html'; ?>


<div class="wrapper-details">
<?php
    include 'connection.php';
    $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
    $registros = mysqli_query($conexion, "SELECT * FROM videos where id=".$_REQUEST['id']) or die("Problemas en el select:" . mysqli_error($conexion));
    if ($reg = mysqli_fetch_array($registros)) { ?>

    <h3> SUBHEADER </h3>
    <h2> <?php echo $reg['name']; ?> </h2>
    <hr>
    <div class="video">
        Video Goes Here:  <?php echo $reg['link']; ?>
        <!-- <iframe width="100%" height="215" src="<?php echo $link; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
    </div>
    <h2> <?php echo $reg['name']; ?> </h2>
    <p> <?php echo $reg['longDesc']; ?> </p>
  <?php  } ?>

</div>

<div class="navigation">
    <button onClick="window.location.href = 'details.php?id=' + <?php echo $_REQUEST['id']-1; ?>"> <i class="bi bi-caret-left-fill"></i> Previous </button>
    <button onClick="window.location.href = 'details.php?id=' + <?php echo $_REQUEST['id']+1; ?>"> Next  <i class="bi bi-caret-right-fill"></i></button>
</div>

<div class="suggestions">
    <p id="alsoLike"> You may also like ... </p>
    <div class="grid-feed">
    <?php   
        include 'connection.php';   
        $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión"); 
        $registros = mysqli_query($conexion, "SELECT * FROM videos") or die("Problemas en el select:" . mysqli_error($conexion));   
        while ($reg = mysqli_fetch_array($registros)) { 
            $shrtLink = explode("/", $reg['link']); 
            $link = "https://www.youtube.com/embed/".$shrtLink[3];  
            ?>  
            <div class="row category" onClick="window.location.href = 'details.php?id=' + <?php echo $reg['id']; ?>">   
                <div class="video"> 
                    Video Goes Here <br><?php echo $reg['link']; ?> 
                    <!-- <iframe width="100%" height="215" src="<?php echo $link; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->    
                </div>  
                <p class="videoTitle"> <?php echo $reg['name']; ?> </p> 
                <p class="videoSrtDesc"> <?php echo $reg['shortDesc']; ?> </p>  
            </div>  
        <?php 
        $i ++;
        if($i == 3){ break; }
        } 
    ?>
</div>

</div>




<script src="feed.js"></script>
<?php include 'footer.html'; ?>
    
</body>
</html>