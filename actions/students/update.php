<?php

global $connection;

$studentId = htmlspecialchars($_POST['student_id']);
$classId = htmlspecialchars($_POST['class_id']);
$userId = htmlspecialchars($_POST['user_id']);

$result = $connection->execute_query("SELECT students.*,
class.name AS class_name,
class.category AS class_category
 FROM students
 JOIN class ON students.class_id = class.id
 JOIN users ON students.user_id = users.id 
 WHERE students.id = ?
 LIMIT 1", [$id]);

$nisn = htmlspecialchars($_POST['nisn'] ?? null);
$nis = htmlspecialchars($_POST['nis'] ?? null);
$name = htmlspecialchars($_POST['name'] ?? null);
$phone = htmlspecialchars($_POST['phone'] ?? null);
$gender = htmlspecialchars($_POST['gender'] ?? null);
$address = htmlspecialchars($_POST['address'] ?? null);
$class_id = htmlspecialchars($_POST['class_id'] ?? null);

$nis = $nis !== "" ? $nis : null;

$query = $connection->execute_query("UPDATE users SET 
        name = '$name', username = 'S$nis'
        WHERE id = ?", [$userId]);
$query = $connection->execute_query("UPDATE students SET 
nisn = '$nisn', 
nis = ?, 
name = '$name', 
phone = '$phone',
gender = '$gender',
address = '$address',
class_id = '$class_id', 
user_id = '$userId'
WHERE id = ?", [$nis, $studentId]);

$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil mengubah data Siswa.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/students');
die();
