<?php


/// begin getRealIpUser functions ///

function getRealIpUser()
{

    switch (true) {

        case (!empty($_SERVER['HTTP_X_REAL_IP'])):
            return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])):
            return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        default:
            return $_SERVER['REMOTE_ADDR'];
    }
}

function current_date()
{
    $date = new DateTime();
    return $date->format('Y/m/d/H:i:s');
}



/**
 * @param $required_fields_array, n array containing the list of all required fields
 * @return array, containing all errors
 */
function check_empty_fields($required_fields_array)
{
    //initialize an array to store error messages
    $form_errors = array();

    //loop through the required fields array snd popular the form error array
    foreach ($required_fields_array as $name_of_field) {
        if (!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL) {
            $form_errors[] = $name_of_field . " field is required";
        }
    }

    return $form_errors;
}




/**
 * @param $fields_to_check_length, an array containing the name of fields
 * for which we want to check min required length e.g array('username' => 4, 'email' => 12)
 * @return array, containing all errors
 */
function check_min_length($fields_to_check_length)
{
    //initialize an array to store error messages
    $form_errors = array();

    foreach ($fields_to_check_length as $name_of_field => $minimum_length_required) {
        if (strlen(trim($_POST[$name_of_field])) < $minimum_length_required) {
            $form_errors[] = $name_of_field . " is too short, must be {$minimum_length_required} characters long";
        }
    }
    return $form_errors;
}

/**
 * @param $data, store a key/value pair array where key is the name of the form control
 * in this case 'email' and value is the input entered by the user
 * @return array, containing email error
 */
function check_email($data)
{
    //initialize an array to store error messages
    $form_errors = array();
    $key = 'email';
    //check if the key email exist in data array
    if (array_key_exists($key, $data)) {

        //check if the email field has a value
        if ($_POST[$key] != null) {

            // Remove all illegal characters from email
            $key = filter_var($key, FILTER_SANITIZE_EMAIL);

            //check if input is a valid email address
            if (filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false) {
                $form_errors[] = $key . " is not a valid email address";
            }
        }
    }
    return $form_errors;
}

/**
 * @param $form_errors_array, the array holding all
 * errors which we want to loop through
 * @return string, list containing all error messages
 */
function show_errors($form_errors_array)
{
    $errors = "<p><ul class='alert error'>";

    //loop through error array and display all items in a list
    foreach ($form_errors_array as $the_error) {
        $errors .= "<li style='list-style: none;'> {$the_error} </li>";
    }
    $errors .= "</ul></p>";
    return $errors;
}

// FUnction for Notifications
function flashMessage($message, $PassOrFail = "Fail")
{
    if ($PassOrFail === "Pass") {
        $data = "<p class='alert success'>{$message}</p>";
    } else {
        $data = "<p class='alert error'>{$message}</p>";
    }
    return $data;
}

//Function to redirect Page
function redirectTo($page)
{
    header("location: {$page}");
}


//Function to check username
function checkDuplicateUsername($a_username, $db)
{
    try {
        //create SQL query
        $query = "SELECT username FROM admins WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->execute(array(':username' => $a_username));

        if ($row = $statement->fetch()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $ex) {
        $result = flashMessage("An error occurred: " . $ex->getMessage());
    }
}

//Function to check Email
function checkDuplicateEmail2($a_email, $db)
{
    try {
        //create SQL query
        $query = "SELECT email FROM admins WHERE email = :email";
        $statement = $db->prepare($query);
        $statement->execute(array(':email' => $a_email));

        if ($row = $statement->fetch()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $ex) {
        $result = flashMessage("An error occurred: " . $ex->getMessage());
    }
}


function guard()
{
    $isValid = true;
    $inActive = 60 * 2; //2mins
    $fingerprint = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

    if ((isset($_SESSION['fingerprint']) && $_SESSION['fingerprint'] != $fingerprint)) {
        $isValid = false;
        signout();
    } else if ((isset($_SESSION['last_active']) && (time() - $_SESSION['last_active']) > $inActive) && $_SESSION['username']) {
        $isValid = false;
        signout();
    } else {
        $_SESSION['last_active'] = time();
    }

    return $isValid;
}

function _token()
{
    $randomToken = base64_encode(openssl_random_pseudo_bytes(32));

    return $_SESSION['token'] = $randomToken;
}

function validate_token($request_token)
{

    if (isset($_SESSION['token']) && $request_token === $_SESSION['token']) {
        unset($_SESSION['token']);

        return true;
    }
    return false;
}


// Error Messages 
function errorMessage()
{

    if (isset($_SESSION["errorMessage"])) {
        $output = "<div class='alert alert-danger text-center'>";
        $output .= htmlentities($_SESSION['errorMessage']);
        $output .= "</div>";
        $_SESSION["errorMessage"] = null;
        return $output;
    }
}

//Success Messages

function successMessage()
{

    if (isset($_SESSION["successMessage"])) {
        $output = "<div class='alert alert-success text-center'>";
        $output .= htmlentities($_SESSION['successMessage']);
        $output .= "</div>";
        $_SESSION["successMessage"] = null;
        return $output;
    }
}


