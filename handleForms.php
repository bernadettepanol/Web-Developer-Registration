<?php
require_once 'dbConfig.php';
require_once 'models.php';

$error = '';
$successMessage = '';

// Handle insertion
if (isset($_POST['insertNewDeveloperBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $skills = trim($_POST['skills']);
    $experienceYears = trim($_POST['experienceYears']);

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($skills) && !empty($experienceYears)) {
        $query = insertIntoDeveloperRecords($pdo, $firstName, $lastName, $email, $phone, $skills, $experienceYears);
       
        if ($query) {
            $successMessage = "Web Developer registered successfully!";
        } else {
            $error = "Insertion failed";
        }
    } else {
        $error = "Make sure that no fields are empty";
    }
}

// Handle update
if (isset($_POST['editDeveloperBtn'])) {
    $developer_id = $_GET['developer_id'];
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $skills = trim($_POST['skills']);
    $experienceYears = trim($_POST['experienceYears']);

    if (!empty($developer_id) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($skills) && !empty($experienceYears)) {
        $query = updateAWebDeveloper($pdo, $developer_id, $firstName, $lastName, $email, $phone, $skills, $experienceYears);
       
        if ($query) {
            $successMessage = "Web Developer updated successfully!";
            header("Location: ../S/index.php"); // Redirect to index.php after successful update
            exit();
        } else {
            $error = "Update failed";
        }
       
    } else {
        $error = "Make sure that no fields are empty";
    }
}

// Handle deletion
if (isset($_POST['deleteDeveloperBtn'])) {
    $query = deleteAWebDeveloper($pdo, $_GET['developer_id']);
    if ($query) {
        $successMessage = "Web Developer deleted successfully!";
        header("Location: ../S/index.php"); // Redirect to index.php after successful deletion
        exit();
    } else {
        $error = "Deletion failed";
    }
   
}

// Get all records for display
$seeAllDeveloperRecords = seeAllDeveloperRecords($pdo);
?>
