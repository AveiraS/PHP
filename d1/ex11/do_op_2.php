#!/usr/bin/php
<?PHP
function ft_error() {
    echo "Syntax Error\n";
    exit();
}
if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit();
}
else
{
    if (strpos($argv[1], "+") == true){
        $op = '+';
        $tab = explode("+", $argv[1]);
    }
	else if (strpos($argv[1], "-") == true){
        $op = '-';
        $tab = explode("-", $argv[1]);
    }
	else if (strpos($argv[1], "*") == true){
        $op = "*";
        $tab = explode("*", $argv[1]);
    }
    else if (strpos($argv[1], "/") == true){
        $op = '/';
        $tab = explode("/", $argv[1]);
    }
	else if (strpos($argv[1], "%") == true){
        $op = '%';
        $tab = explode("%", $argv[1]);
    }
	else
        ft_error();
	if (count($tab) != 2)
        ft_error();
}

foreach ($tab as $value)
    $valid_num[] = trim($value);
	if (is_numeric($valid_num[0]) && is_numeric($valid_num[1]))
	{
		switch ($op) {
            case '+':
                echo $valid_num[0] + $valid_num[1];
                break;
            case '-':
                echo $valid_num[0] - $valid_num[1];
                break;
            case '*':
                echo $valid_num[0] * $valid_num[1];
                break;
            case '/':
                echo $valid_num[0] / $valid_num[1];
                break;
            case '%':
                echo $valid_num[0] % $valid_num[1];
                break;
        }
        echo "\n";
    }
    else
	    ft_error();
?>