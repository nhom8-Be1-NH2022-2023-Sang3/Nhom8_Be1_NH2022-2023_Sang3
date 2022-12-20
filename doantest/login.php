<?php session_start() ;
     //var_dump($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../doantest/css/dangnhap.css">
    
    <title>Đăng nhập</title>
</head>
<body>
    
<form action="" method="post" >
        <div class="box">
            <div class="form">
                <h1>Sign in</h1>
                <div class="inputBox">
                    <span>Username</span>
                    <input type="text" class="form-control" required=" required" id="username" name="username">
                    
                </div>
                <div class="inputBox">
                    <span>Password</span>

                    <div class="check">
                        <input type="password" class="form-control" id="password" required=" required" name="password" >
                        <!-- <div class="invalid-feedback">
                            Password is Incorrect.
                        </div> -->
                        <a id="toggleBtn" class="hide"></a>
                    </div>
                </div>
                <div class="links">
                    <a href="#">Forgot Password</a>
                    <a href="register.php">Sign up</a>
                </div>
                <div class="btn-submit">
                <button type="submit" class="btn" name = "submit"  >Submit</button>
                </div>
                
            </div>
        </div>
    </form>
    <script>
        const password = document.querySelector('#password');
        const toggleBtn = document.querySelector('#toggleBtn');
        toggleBtn.onclick = function () {
            if (password.type === 'password') {
                password.setAttribute('type', 'text');
                toggleBtn.classList.add('hide');
            } else {
                password.setAttribute('type', 'password');
                toggleBtn.classList.remove('hide');
            }
        }
    </script>
    <?php 
            require "../dangnhap/login.php";
            ?>
</body>
</html>