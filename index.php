<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>please write 2 numbers here and choose your considered operation</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="firstNumber" placeholder="write first number" value="<?php if(!empty($_POST['firstNumber'])) echo htmlspecialchars($_POST['firstNumber']); ?>">
        <br><br>
        <input type="number" name="secondNumber" placeholder="write second number" value="<?php if(!empty($_POST['secondNumber'])) echo htmlspecialchars($_POST['secondNumber']); ?>">
        <br><br>
        <select name="operation" >
            <option value="">Select an operation</option>
            <option value="addition" <?php if(isset($_POST['operation']) && $_POST['operation'] == "addition") echo "selected"; ?> >+</option>
            <option value="subtraction" <?php if(isset($_POST['operation']) && $_POST['operation'] == "subtraction") echo "selected"; ?> >-</option>
            <option value="multiplication" <?php if(isset($_POST['operation']) && $_POST['operation'] == "multiplication") echo "selected"; ?> >*</option>
            <option value="division" <?php if(isset($_POST['operation']) && $_POST['operation'] == "division") echo "selected"; ?> >÷</option>
        </select>
        <br><br>
        <button type="submit">do the considered operation</button>
        <br><br>
    </form>
    <?php
    function sanitizeNumbers ($numbers){
        $numbers = trim($numbers);
        $numbers = htmlspecialchars($numbers);
        $numbers = stripslashes($numbers);
        return $numbers;
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $firstNumber = sanitizeNumbers($_POST['firstNumber']);
        $secondNumber = sanitizeNumbers($_POST['secondNumber']);
        $operation = sanitizeNumbers($_POST['operation']);
        $result = "";
    }
    if(empty($firstNumber) || empty($secondNumber) || empty($operation)){
        echo "ERROR : please fill all the inputs and operation part.";
    }else{
        if(isset($operation) && !empty($operation)){
            if ($operation == "addition"){
                $result = $firstNumber + $secondNumber;
                echo "the result to addition of these two numbers[$firstNumber and $secondNumber] is $result";
            }if ($operation== "subtraction"){
                $result = $firstNumber - $secondNumber;
                echo "the result to subtraction of these two numbers[$firstNumber and $secondNumber] is $result";
            }if ($operation == "multiplication"){
                $result = $firstNumber * $secondNumber;
                echo "the result to multiplication of these two numbers[$firstNumber and $secondNumber] is $result";        
            }if ($operation =="division"){
                if($secondNumber==0){
                    echo "ERROR : division to zero is not allowed please change it to another number";
                }else{
                    $result = $firstNumber / $secondNumber;
                    echo "the result to division of these two numbers[$firstNumber and $secondNumber] is $result";
                }
            }
        }
    }



    ?>
</body>
</html>