<?php

global $connection;

$classId = htmlspecialchars($_POST['class_id']);
$userId = htmlspecialchars($_POST['user_id']);

$result = $connection->execute_query("SELECT students.*,
class.name AS class_name,
class.category AS class_category
 FROM students
 JOIN class ON students.class_id = class.id
 JOIN users ON students.user_id = users.id 
 WHERE user_id = ?
 LIMIT 1", [$userId]);

$student = $result->fetch_assoc();

$nisn = htmlspecialchars($_POST['nisn'] ?? null);
$nis = htmlspecialchars($_POST['nis'] ?? null);
$name = htmlspecialchars($_POST['name'] ?? $student['name']);
$phone = htmlspecialchars($_POST['phone'] ?? $student['phone']);
$gender = htmlspecialchars($_POST['gender'] ?? $student['gender']);
$address = htmlspecialchars($_POST['address'] ?? $student['address']);
$class_id = htmlspecialchars($_POST['class_id'] ?? $student['class_id']);

$query = $connection->execute_query("UPDATE users SET 
        name = '$name'
        WHERE id = ?", [$userId]);

$query = $connection->execute_query("UPDATE students SET 
name = '$name', 
phone = '$phone',
gender = '$gender',
address = '$address',
class_id = '$class_id'
WHERE students.user_id = ?", [$userId]);

$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil mengubah data Siswa.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/dashboard');
die();
