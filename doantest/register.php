<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="../doantest/css/dangnhap.css">
          <script src="https://kit.fontawesome.com/f6dce9b617.js" crossorigin="anonymous"></script>
          <title>Register</title>
</head>
<body>
<form action="../dangnhap/register_submit.php" method="post" >
        <div class="box" style = "height:500px">
            <div class="form" >
                <h1>Đăng ký</h1>
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
                <div class="inputBox">
                <span>RePassword</span>
                <div class="check">
                        <input type="password" class="form-control" id="repassword" required=" required" name="repassword" >
                        <!-- <div class="invalid-feedback">
                            Password is Incorrect.
                        </div> -->
                        <a id="retoggleBtn" class="hide"></a>
                    </div>
                </div>
                <div class="submit" style = "text-align:center; padding-top: 20px;">
                    <button type="submit" class="btn" name = "submit"  >Đăng ký</button>
                </div>
                
                </div>
                
            </div>
        </div>
    </form>
</body>
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
</html>