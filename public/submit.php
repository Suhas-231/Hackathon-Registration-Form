<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Details</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $emergencyName = $_POST['emergencyName'];
    $emergencyPhone = $_POST['emergencyPhone'];
    $aboutData = json_decode($_POST['aboutData'], true);
    $educationData = json_decode($_POST['educationData'], true);
    $experienceData = json_decode($_POST['experienceData'], true);
    $profileLinks = json_decode($_POST['profileLinks'], true);

    echo "<h1>Registration Details</h1>";
    echo "<h2>About</h2>";
    echo "First Name: " . htmlspecialchars($aboutData['firstName']) . "<br>";
    echo "Last Name: " . htmlspecialchars($aboutData['lastName']) . "<br>";
    echo "Gender: " . htmlspecialchars($aboutData['gender']) . "<br>";
    echo "T-shirt Size: " . htmlspecialchars($aboutData['tshirtSize']) . "<br>";

    // Check if dietaryPreferences exists and is an array
    if (isset($aboutData['dietaryPreferences']) && is_array($aboutData['dietaryPreferences'])) {
        echo "Dietary Preferences: " . implode(", ", array_map('htmlspecialchars', $aboutData['dietaryPreferences'])) . "<br>";
    } else {
        echo "Dietary Preferences: None selected<br>";
    }

    echo "<h2>Education</h2>";
    echo "Degree Type: " . htmlspecialchars($educationData['degreeType']) . "<br>";
    echo "Institution: " . htmlspecialchars($educationData['institution']) . "<br>";
    echo "Field of Study: " . htmlspecialchars($educationData['fieldOfStudy']) . "<br>";
    echo "Expected Year of Graduation: " . htmlspecialchars($educationData['graduationYear']) . "<br>";

    echo "<h2>Experience</h2>";
    echo "Roles: " . htmlspecialchars($experienceData['roles']) . "<br>";
    echo "Skills: " . implode(", ", array_map('htmlspecialchars', explode(',', $experienceData['skills']))) . "<br>";

    echo "<h2>Profile Links</h2>";
    echo "Profile Links: " . implode("<br>", array_map('htmlspecialchars', $profileLinks)) . "<br>";

    echo "<h2>Contact Information</h2>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Phone: " . htmlspecialchars($phone) . "<br>";
    echo "City: " . htmlspecialchars($city) . "<br>";
    echo "Emergency Contact Name: " . htmlspecialchars($emergencyName) . "<br>";
    echo "Emergency Contact Phone: " . htmlspecialchars($emergencyPhone) . "<br>";
} else {
    echo "Invalid request method.";
}
?>
</div>
</body>
</html>