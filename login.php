<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>

<header class="header">
    <a href="#" class="wall"><img src="img/logo.png" alt="The Wall"  class="wall"></a>

</header>


<div  class="TableLogin">
    <form method="post" class="tableLogin" action="inlogpoort.php">

        <label></label><input type="text" name="username" placeholder="Username" required="required"/></label><br>
        <label></label><input type="password" name="password" placeholder="password" required="required"/></label><br>

        <input type="submit" name="submit_login" value="Login" />
    </form>
</div>

</body>
</html> jio