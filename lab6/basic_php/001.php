<?php
// --- Variables ---
$name = "Samina";
$age = 22;
$isStudent = true;

// --- Arrays ---
$fruits = array("Apple", "Banana", "Orange");
$scores = [90, 85, 78, 92];

$student = array(
    "name" => "Samina",
    "age" => 22,
    "course" => "PHP Programming"
);

echo "For Loop (Numbers 1 to 5):<br>";
for ($i = 1; $i <= 5; $i++) {
    echo $i . " ";
}
echo "<br><br>";

echo "Foreach Loop (Fruits):<br>";
foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}
echo "<br>";

echo "While Loop (Counting Down):<br>";
$count = 5;
while ($count > 0) {
    echo $count . " ";
    $count--;
}
echo "<br><br>";

if ($isStudent) {
    echo "$name is a student.<br>";
} else {
    echo "$name is not a student.<br>";
}

echo "<br>Server Info:<br>";
echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "Script Name: " . $_SERVER['SCRIPT_NAME'] . "<br>";

list($first, $second, $third) = $fruits;
echo "<br>First fruit: $first, Second fruit: $second, Third fruit: $third<br>";
?>