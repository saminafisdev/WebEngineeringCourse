<?php

function gcd($a, $b) {
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function gcd_subtraction($a, $b) {
    while ($a != $b) {
        if ($a > $b) {
            $a = $a - $b;
        } else {
            $b = $b - $a;
        }
    }
    return $a;
}


function secondLargestGCD($arr) {
    $n = count($arr);
    $gcds = [];

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            $g = gcd_subtraction($arr[$i], $arr[$j]);
            $gcds[$g] = true;
        }
    }

    $uniqueGCDs = array_keys($gcds);
    rsort($uniqueGCDs);

    return $uniqueGCDs[1] ?? null;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputString = $_POST['numbers'] ?? '';
    $inputArray = array_filter(array_map('intval', preg_split('/\s+/', trim($inputString))));

    if (count($inputArray) < 2 || count($inputArray) > 6) {
        $message = "<span style='color: red;'>❌ Please enter between 2 and 6 integers.</span>";
    } else {
        $secondGCD = secondLargestGCD($inputArray);
        if ($secondGCD !== null) {
            $message = "<span style='color: green;'>✅ The 2nd largest unique GCD is: <strong>$secondGCD</strong></span>";
        } else {
            $message = "<span style='color: orange;'>⚠️ Not enough unique GCDs found to determine the 2nd largest.</span>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Second Largest GCD Calculator</title>
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="wrapper">
        <h1>Second Largest GCD</h1>
        <form method="post" action="">
            <label for="numbers">Enter 2 to 6 integers (space separated):</label>
            <input type="text" id="numbers" name="numbers" placeholder="e.g. 12 15 18 21 24" value="<?php echo isset($_POST['numbers']) ? htmlspecialchars($_POST['numbers']) : ''; ?>" required>
            <button type="submit">Calculate</button>
        </form>
        <div class="message"><?php echo $message; ?></div>
    </div>
</body>
</html>
