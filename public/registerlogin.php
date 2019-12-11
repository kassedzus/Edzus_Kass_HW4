
<div class="form-container">
    <div class="login-container" id="logForm">
        <h3>Welcome to Checklist<sup>&copy;</sup></h3>
        <h4>Please log in or register</h4>
        <form action="../src/processLogin.php" method="post">
            <p>Username:</p>
            <input type="text" class="user-input" name="username" placeholder="Username..">
            <p>Password:</p>
            <input type="password" class="pass-input" name="password" placeholder="Password.."><br>
            <button type="submit" id="logBtn">Log In</button>
        </form><br>
        <div>
            <p>Don't have an account? </p>
            <button id="regBut">Register here</button>
        </div>
    </div>

    <div class="register-form" id="regForm">
        <button id="backBtn"><- Back</button><br>
        <form action="../src/processRegister.php" method="post">
            <p>Enter your new username:</p>
            <input type="text" class="user-input" name="regUsername" placeholder="Username..">
            <p>Enter password:</p>
            <input type="password" class="pass-input" name="regPassword" placeholder="Password.."><br>
            <p>Confirm password:</p>
            <input type="password" class="pass-input" name="regPassword2" placeholder="Confirm password.."><br><br>
            <button id="regBtn">Register</button>
        </form>
    </div>
</div>