<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = fopen("subscribers.csv", "a");
        fputcsv($file, [$name, $email, date("Y-m-d H:i:s")]);
        fclose($file);
        echo "<h2>Thanks for subscribing, $name!</h2>";
        echo "<a href='view-subscribers.php'>View Subscribers</a>";
    } else {
        echo "<h2>Invalid input. Please try again.</h2>";
    }
}
?>
