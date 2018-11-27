<?php
/* Set e-mail recipient */
$myemail  = "sylvia.jamison647@gmail.com";

/* Check all form inputs using check_input function */

$yourname = check_input($_POST['yourname'], "Enter your name");
$email  = check_input($_POST['email']);
$emergency    = check_input($_POST['emergency']);
$age  = check_input($_POST['age']);
$gender   = check_input($_POST['gender']);
$event = check_input($_POST['event']);
$comments = check_input($_POST['comments'], "Write your comments");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

$message = "Hello!

Your registration form has been submitted by:

Name: $yourname
E-mail: $email

Comments:
$comments

End of message
";

/* Send the message using mail() function */
mail($myemail, "Registration", $message);


/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>