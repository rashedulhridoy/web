<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Validation Example</title>
    <link rel="stylesheet" href="daddy/style.css" type="text/css">
</head>
<body>
    <div class="container">
        <?php
        // define
        $nameErr = $emailErr = $genderErr = $websiteErr = "";
        $name = $email = $gender = $comment = $website = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
                if (!preg_match('/^[a-zA-Z-`]*$/', $name)) {
                    $nameErr = "Only letters and white space allowed";
                }
            }
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }
            if (empty($_POST["website"])) {
                $website = "";
            } else {
                $website = test_input($_POST["website"]);
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                    $websiteErr = "Invalid URL";
                }
            }
            if (empty($_POST["comment"])) {
                $comment = "";
            } else {
                $comment = test_input($_POST["comment"]);
            }
            if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
            } else {
                $gender = test_input($_POST["gender"]);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <h2>PHP Form Testing Purpose </h2>
        <p><span class="error">* Required field</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>">
            <span class="error">* <?php echo $nameErr; ?></span>
            
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>">
            <span class="error">* <?php echo $emailErr; ?></span>
            
            <label for="website">Website:</label>
            <input type="text" id="website" name="website" value="<?php echo $website; ?>">
            <span class="error"><?php echo $websiteErr; ?></span>
            
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
            
            <label>Gender:</label>
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female"> Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male"> Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other"> Other
            <span class="error">* <?php echo $genderErr; ?></span>
            <br><br>
            <input class="submit" type="submit" name="submit" value="Submit">
        </form>
        <?php
        echo "<h2>Your Output:</h2>";
        echo "Your Name: $name";
        echo "<br>";
        echo "Your Email: $email";
        echo "<br>";
        echo "Your Website: $website";
        echo "<br>";
        echo "Your Comment: $comment";
        echo "<br>";
        echo "Your Gender: $gender";
        echo "<br>";
        ?>
    </div>
</body>
</html>
