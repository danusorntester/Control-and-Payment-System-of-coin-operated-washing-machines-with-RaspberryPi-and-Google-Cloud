<html>
<head>
<title>Users Login</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="frm">
  <form name="form1" method="post" action="check_login.php">
  <div class="txt">
    <img src="138.png" vspace="15"><br>
    <table class="center">
      <tbody>
        <tr>
          <td>
            <input class="textinput" name="txtUsername" type="text" id="txtUsername" placeholder="Username">
          </td>
        </tr><tr></tr><tr></tr>
        <tr>
          <td><input class="textinput" name="txtPassword" type="password" id="txtPassword" placeholder="Password"
            onblur="if(this.value.length == 0) this.value='Password';" 
            onclick="if(this.value == 'Password') this.value='';" >
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <br>
    <input type="submit" class="button" value="LOGIN">
  </div>
  </form>
</div>
</body>
</html>