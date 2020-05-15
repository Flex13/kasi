
<?php
if (isset($_GET['id'])) {
    $encoded_id = $_GET['id'];
    $decode_id = base64_decode($encoded_id);
    $user_id_array = explode("encodeuserid", $decode_id);
    $id = $user_id_array[1];

    $sql = "UPDATE cab SET activated=:activated WHERE cab_id=:cab_id AND activated='0'";

    $statement = $db->prepare($sql);
    $statement->execute(array(':activated' => "1", ':cab_id' => $id));

    if ($statement->rowCount() == 1) {
        $result = '<h4 class="card-title text-center">Email Confirmed </h4>
    <p>Your email address has been verified, you can now Login with your email and password and update your profile.</p>';
    } else {
        $result = '<p class="lead">No changes made please contact site admin,
        if you have not confirmed your email before.</p>';
    }
}