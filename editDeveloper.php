<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Web Developer</title>
</head>
<body>
    <h3>Edit Web Developer Information</h3>
    <?php $developer = getWebDeveloperByID($pdo, $_GET['developer_id']); ?>
    <form action="../core/handleForms.php?developer_id=<?php echo $developer['DeveloperID']; ?>" method="POST">
        <p><label for="firstName">First Name</label> <input type="text" name="firstName" value="<?php echo $developer['FirstName']; ?>"></p>
        <p><label for="lastName">Last Name</label> <input type="text" name="lastName" value="<?php echo $developer['LastName']; ?>"></p>
        <p><label for="email">Email</label> <input type="email" name="email" value="<?php echo $developer['Email']; ?>"></p>
        <p><label for="phone">Phone</label> <input type="text" name="phone" value="<?php echo $developer['Phone']; ?>"></p>
        <p><label for="skills">Skills</label> <input type="text" name="skills" value="<?php echo $developer['Skills']; ?>"></p>
        <p><label for="experienceYears">Years of Experience</label> <input type="number" name="experienceYears" value="<?php echo $developer['ExperienceYears']; ?>"></p>
        <input type="submit" name="editDeveloperBtn" value="Update">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
