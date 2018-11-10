<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>
<body>

<header class="header">
    <a href="#" class="wall"><img src="img/logo.png" alt="The Wall"  class="wall"></a>

</header>



<div class="TableRegister">
    <form method="post" class="tableRegister" action="process.registration.php" >

        <label><input type="text" name="firstname" placeholder="Firstname" required autofocus="autofocus"/></label><br>
        <label><input type="text" name="lastname" placeholder="Lastname" required/></label><br>
        <label></label> <input type="email" name="email" placeholder="E-mail" required/></label><br>
        <label></label><input type="text" name="username" placeholder="Username" required/></label><br>
        <label></label><input type="password" name="password1" placeholder="Password" required/></label><br>
        <label></label><input type="password" name="password2" placeholder="Repeat Password" required/></label><br>
        <label><input type="submit" name="submit_registration" value="REGISTREER" /></label>
    </form>
</div>

</body>
</html>