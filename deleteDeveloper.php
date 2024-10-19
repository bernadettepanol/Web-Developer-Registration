<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Web Developer</title>
</head>
<body>
    <h3>Are you sure you want to delete this Web Developer?</h3>
    <?php
        $developer = getWebDeveloperByID($pdo, $_GET['developer_id']);
        if ($developer) {
    ?>
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($developer['FirstName']); ?></p>
        <p><strong>Last Name:</strong> <?php echo htmlspecialchars($developer['LastName']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($developer['Email']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($developer['Phone']); ?></p>
        <p><strong>Skills:</strong> <?php echo htmlspecialchars($developer['Skills']); ?></p>
        <p><strong>Years of Experience:</strong> <?php echo htmlspecialchars($developer['ExperienceYears']); ?></p>

        <form action="../core/handleForms.php?developer_id=<?php echo $developer['DeveloperID']; ?>" method="POST">
            <input type="submit" name="deleteDeveloperBtn" value="Yes, Delete">
            <a href="index.php">Cancel</a>
        </form>
    <?php
        } else {
            echo "<p>No Web Developer found.</p>";
        }
    ?>
</body>
</html>
