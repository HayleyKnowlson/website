<?php
/* Set e-mail recipient */
$myemail  = "sylvia.jamison647@gmail.com";

/* Check all form inputs using check_input function */

$fname = check_input($_POST['fname'], "Enter your first name");
$lname = check_input($_POST['lname'], "Enter your last name");
$email  = check_input($_POST['email']);
$comments = check_input($_POST['comments'], "Write your comments");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

$message = "Hello!

Your contact form has been submitted by:

Name: $fname, $lname
E-mail: $email
Event: $event

Comments:
$comments

End of message
";

/* Send the message using mail() function */
mail($myemail, "Registration", $message);

header ('Location: contactthanks.html');

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