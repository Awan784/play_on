function validation()

{
    var user = document.getElementById('username').value;
    if (user == " ")
    {
        document.getElementById('usernamevalidation').innerHTML = "Please Enter Username";
        return false;
    }
}