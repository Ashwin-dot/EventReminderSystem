<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERS Login</title>
</head>

<body>
    <div class="container">
        <div class="loginForm">
            <form action="/php/validation.php" method="post">
                <div class="form-group-username">
                    <label id="username">username</label>
                    <input type="text" name="email" class="email" placeholder="email">
                </div>
                <div class="form-group-password">
                    <label id="username">Password</label>
                    <input type="password" name="password" class="password" placeholder="********">
                </div>
                <button>Log in</button>

            </form>
        </div>
        <div class="loginImg"></div>
    </div>
</body>

</html>