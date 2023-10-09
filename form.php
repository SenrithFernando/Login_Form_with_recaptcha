<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./style.css">


    <title>Form</title>

    <style>
        * {
            margin:0px;
            padding:0px;
            box-sizing:border-box;
            }
            body {
            font-family:sans-serif;
            background:#f5f5f5;
            }
            .login-form {
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            width:90%;
            max-width:450px;
            background:#fff;
            padding:20px 30px;
            box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
            border-radius: 10px;
            }
            .login-form .form-title {
            text-align:center;
            font-size:30px;
            font-weight:600;
            margin:20px 0px 30px;
            color:#111;
            }
            .login-form .form-input {
            margin:10px 0px;
            }
            .login-form .form-input label,
            .login-form .captcha label {
            display:block;
            font-size:15px;
            color:#111;
            margin-bottom:10px;
            }
            .login-form .form-input input {
            width:100%;
            padding:10px;
            outline: none;
            border-radius: 4px;
            border:1px solid #888;
            font-size:15px;
            }
            .login-form .captcha {
            margin:15px 0px;
            }
            .login-form .captcha .preview {
            color:#555;
            width:100%;
            text-align:center;
            height:40px;
            line-height:40px;
            letter-spacing:8px;
            border:1px dashed #888;
            border-radius: 4px;
            font-family:"monospace";
            }
            .login-form .captcha .preview span {
            display:inline-block;
            user-select:none;
            }
            .login-form .captcha .captcha-form {
            display:flex;
            }
            .login-form .captcha .captcha-form input {
            width:100%;
            outline: none;
            padding:8px;
            border-radius: 4px;
            border:1px solid #888;
            }
            .login-form .captcha .captcha-form .captcha-refresh {
            width:40px;
            border:none;
            outline:none;
            background:#888;
            border-radius: 4px;
            color:#eee;
            cursor:pointer;
            }
            #login-btn {
            margin-top:5px;
            width:100%;
            padding:12px;
            border:none;
            outline:none;
            font-size:15px;
            text-transform:uppercase;
            background:#fec107;
            border-radius: 5px;
            color:#fff;
            transition: .3s;
            cursor:pointer;
            }
            #login-btn:hover{
            opacity: .8;
            }

            .swal-button--confirm{
              background:#fec107;
            }
    </style>
</head>
<body>

<div class="login-form">
  <div class="form-title">
    Login
  </div>
  <div class="form-input">
    <label for="username">Name</label>
    <input type="text" id="name">
  </div>
  <div class="form-input">
    <label for="message">Message</label>
    <input type="text" id="message">
  </div>
  <div class="captcha">
    <label for="captcha-input">Enter Captcha</label>
    <div class="preview"></div>
    <div class="captcha-form">
      <input type="text" id="captcha-form" placeholder="Enter captcha text">
      <button class="captcha-refresh">
        <i class="fa fa-refresh"></i>
      </button>
    </div>
  </div>
  <div class="form-input">
    <button id="login-btn">Login</button>
  </div>
</div>
<!-- for cool alerts -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

<script>
    (function(){
  const fonts = ["cursive","sans-serif","serif","monospace"];
  let captchaValue = "";
  function generateCaptcha(){
    let value = btoa(Math.random()*1000000000);
    value = value.substr(0,5+Math.random()*5);
    captchaValue = value;
  }
  function setCaptcha(){
    let html = captchaValue.split("").map((char)=>{
      const rotate = -20 + Math.trunc(Math.random()*30);
      const font = Math.trunc(Math.random()*fonts.length);
      return `<span 
        style="
          transform:rotate(${rotate}deg);
          font-family:${fonts[font]}
        "
      >${char}</span>`;
    }).join("");
    document.querySelector(".login-form .captcha .preview").innerHTML = html;
  }
  function initCaptcha(){
    document.querySelector(".login-form .captcha .captcha-refresh").addEventListener("click",function(){
      generateCaptcha();
      setCaptcha();
    });
    generateCaptcha();
    setCaptcha();
  }
  initCaptcha();
  
  document.querySelector(".login-form #login-btn").addEventListener("click",function(){

      // Get the values from the input elements when the "Login" button is clicked
      const nameInput = document.getElementById("name");
      const messageInput = document.getElementById("message");
      const name = nameInput.value;
      const message = messageInput.value;

    let inputCaptchaValue = document.querySelector(".login-form .captcha input").value;
    if(inputCaptchaValue === captchaValue){
      swal("", "Logging In!", "success");
      window.location.href = `secondpage.php?name=${encodeURIComponent(name)}&message=${encodeURIComponent(message)}`;
    } else {
      swal("Invalid captcha");
    }
  });
})();


</script>

</html>