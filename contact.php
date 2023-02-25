<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" hef="styles.css">
    <title>Document</title>
</head>
<body>
    <?php include "header.html" ?>

    <div class="grid-2" id="contact">
        <div id="left">
            <h3> REACH OUT </h3>
            <h2> Contact Us  <br> Today </h2>
            <p> As a member you'll get instant updates on the latest news and complete access to our team of experts. It's time to set your organization on the cutting edge. </p>
        </div>
        <div>
            <form action="#" class="form-contact">
                <p class="contact-fieldTitle"> EMAIL ADDRESS </p>
                <input type="email" name="email" placeholder="client.mailaddress@example.com" required>

                <div class="inline-fields">
                    <div>
                        <p class="contact-fieldTitle"> FIRST NAME </p>
                        <input type="text" name="name" placeholder="Client's Name" required>
                    </div>
                    <div>
                        <p class="contact-fieldTitle"> LAST NAME </p>
                        <input type="text" name="lastName" placeholder="Client's Last Name" required>
                    </div>
                </div>

                <p class="contact-fieldTitle"> PHONE NUMBER </p>
                <input type="phone" name="phone" placeholder="123 232-2323" required>

                <p class="contact-fieldTitle"> MESSAGE </p>
                <input  type="text" name="message" placeholder="Contact Message" required>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>





    
    <?php include "footer.html" ?>
</body>
</html>