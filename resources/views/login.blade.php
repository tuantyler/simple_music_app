<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
}

body {
    background: #1f2433;
    font-family: "Rubik", sans-serif;
}

.login-form {
    background: #fff;
    width: 500px;
    margin: 65px auto;
    display: flex;
    flex-direction: column;
    border-radius: 4px;
    box-shadow: 0 2px 25px rgba(0, 0, 0, 0.2);
}

.login-form h1 {
    padding: 35px 35px 0 35px;
    font-weight: 300;
}

.login-form .content {
    padding: 35px;
    text-align: center;
}

.login-form .input-field {
    padding: 12px 5px;
}

.login-form .input-field input {
    font-size: 16px;
    display: block;
    font-family: "Rubik", sans-serif;
    width: 100%;
    padding: 10px 1px;
    border: 0;
    border-bottom: 1px solid #747474;
    outline: none;
    transition: all 0.2s;
}

.login-form .input-field input::-moz-placeholder {
    text-transform: uppercase;
}

.login-form .input-field input:-ms-input-placeholder {
    text-transform: uppercase;
}

.login-form .input-field input::placeholder {
    text-transform: uppercase;
}

.login-form .input-field input:focus {
    border-color: #222;
}

.login-form a.link {
    text-decoration: none;
    color: #747474;
    letter-spacing: 0.2px;
    text-transform: uppercase;
    display: inline-block;
    margin-top: 20px;
}

.login-form .action {
    display: flex;
    flex-direction: row;
}

.login-form .action button {
    width: 100%;
    border: none;
    padding: 18px;
    font-family: "Rubik", sans-serif;
    cursor: pointer;
    text-transform: uppercase;
    background: #e8e9ec;
    color: #777;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 0;
    letter-spacing: 0.2px;
    outline: 0;
    transition: all 0.3s;
}

.login-form .action button:hover {
    background: #d8d8d8;
}

.login-form .action button:nth-child(2) {
    background: #2d3b55;
    color: #fff;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 4px;
}

.login-form .action button:nth-child(2):hover {
    background: #3c4d6d;
}
</style>
<div class="login-form">
    <form method="POST" action="{{ route('postLogin') }}">
        @csrf
        <h1>Login</h1>
        <div class="content">
            <div class="input-field">
            <input placeholder="Username" name="username" autocomplete="nope">
            </div>
            <div class="input-field">
            <input type="password" placeholder="Password" name="password" autocomplete="new-password">
            </div>
        </div>
        <div class="action">
            <button>Sign in</button>
        </div>
    </form>
</div>
</body>
</html>