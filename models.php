<?php
require_once 'dbConfig.php';

function insertIntoDeveloperRecords($pdo, $first_name, $last_name, $email, $phone, $skills, $experience_years) {
    $sql = "INSERT INTO WebDevelopers (FirstName, LastName, Email, Phone, Skills, ExperienceYears) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $email, $phone, $skills, $experience_years]);
    return $executeQuery;
}

function seeAllDeveloperRecords($pdo) {
    $sql = "SELECT * FROM WebDevelopers";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    return $executeQuery ? $stmt->fetchAll() : [];
}

function getWebDeveloperByID($pdo, $developer_id) {
    $sql = "SELECT * FROM WebDevelopers WHERE DeveloperID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$developer_id]) ? $stmt->fetch() : null;
}

function updateAWebDeveloper($pdo, $developer_id, $first_name, $last_name, $email, $phone, $skills, $experience_years) {
    $sql = "UPDATE WebDevelopers SET FirstName = ?, LastName = ?, Email = ?, Phone = ?, Skills = ?, ExperienceYears = ? WHERE DeveloperID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $email, $phone, $skills, $experience_years, $developer_id]);
}

function deleteAWebDeveloper($pdo, $developer_id) {
    $sql = "DELETE FROM WebDevelopers WHERE DeveloperID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$developer_id]);
}
?>
