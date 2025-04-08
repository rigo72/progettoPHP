<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
<form class="form" method="post" action="scriptregistrazione.php">
    <p class="title">Register </p>
    <p class="message">Signup now and get full access to our app. </p>
        <label>
            <input class="input" type="text" required="" name="username">
            <span>Username</span> 
        </label>
        <div class="flex">
        <label>
            <input class="input" type="text" required="" name="firstname">
            <span>Firstname</span>
        </label>

        <label>
            <input class="input" type="text" required="" name="lastname">
            <span>Lastname</span>
        </label>
    </div>  
            
    <label>
        <input class="input" type="email" required="" name="email">
        <span>Email</span>
    </label> 
        
    <label>
        <input class="input" type="password" required="" name="password">
        <span>Password</span>
    </label>
    <button class="submit">Submit</button>
    <p class="signin">Hai gia un account ? <a href="paginalogin.php">Login</a> </p>
</form>
</body>
</html>