<html>
<head>
<title>Users Login</title>
<link rel="stylesheet" type="text/css" href="styleregister.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<div id ="frm">
    <form name="form1" method="post" action="save_register.php">
    <p class="text1">เพิ่มผู้ใช้รายใหม่</p><br>
    <table class="table">
        <tbody>
        <tr>
            <td class="text"> Username&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input name="txtUsername" type="text" id="txtUsername" size="10">
            </td>
        </tr>
        <tr>
            <td class="text"> Password&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input name="txtPassword" type="password" id="txtPassword" size="20">
            </td>
        </tr>
        <tr>
            <td class="text"> Confirm Password&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input name="txtConPassword" type="password" id="txtConPassword" size="20">
            </td>
        </tr>
        <tr>
            <td class="text"> Name&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input name="txtName" type="text" id="txtName" size="35"></td>
        </tr>
        <tr>
            <td class="text"> PhoneNumber&nbsp;&nbsp;&nbsp;</td>
            <td><input name="txtPhoneNumber" type="text" id="txtPhoneNumber" size="10"></td>
        </tr> 
        <tr>
            <td class="text"> Room&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input name="txtRoom" type="text" id="txtRoom" size="3"></td>
        </tr>
        <tr>
            <td class="text"> Status&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>
            <select name="Status" id="Status" style="height: 30">
                <option value="USER">USER</option>
            </select>
    </td>
        </tr>
        </tbody>
    </table>
    <br><br>
    <input class="button" type="submit" name="Submit" value="Save">
    </form>
</div>
</body>
</html>