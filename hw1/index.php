<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP homework 1</title>
</head>
<body>

    <style>
        /* Don't do like that in real life, instead use seperate file for css */
        i { 
            color: blue; 
        }

        li {
            margin-bottom: 15px;
        }
    </style>

    <?php
        error_reporting(E_ALL); // remove after debugging

        function get_var_dump_output($in_var)
        {
            ob_start(); // turn internal buffering on for output
            var_dump($in_var);
            return ob_get_clean();  // get what we have in buffer and remove current internal buffer
        }

        $header = 'PHP homework 1';
        echo "<h1>$header</h1><hr>\n";

        $a = 5;
        $b = '05';
        echo "<span>Initial values:</span><code> \$a = $a; \$b = '$b';</code><br><br>";
        
        $results = get_var_dump_output( $a == $b );
        echo "<ol>\n\t<li><code>var_dump(\$a == \$b);</code> ==> $results;";
        echo '<i> // true - because $b is casted implicitly to int and leading zeros are ignored (not interpreted as octal value as we may think) </i></li>';

        $results = get_var_dump_output( (int)'012345' );
        echo "<li><code>var_dump((int)'012345');</code> ==> $results;";
        echo '<i> // 12345 - the same as above but cust is explicit</i></li>';


        $results = get_var_dump_output( (float)123.0 === (int)123.0 );
        echo "<li><code>var_dump((float)123.0 === (int)123.0);</code> ==> $results;";
        echo '<i> // false because two operands are explicitly casted to different types but for comparison operator === (identical) the types should be the same for both operands and for === the operands are not casted implicitly to the same type as for == operator.</i></li>';

        $results = get_var_dump_output( (int)0 === (int)'hello, world' );
        echo "<li><code>var_dump((int)0 === (int)'hello, world');</code> ==> $results;";
        echo '<i> // True because both of the same type and are 0. If during the cast to number string starts with invalid numeric data, the value will be 0</i></li></ol>';


        echo '<h3>Swapping</h3>';
        
        $a = 5;
        $b = 10;
        
        $a ^= $b;
        $b ^= $a;
        $a ^= $b;

        echo "Initial values: a = $a and b = $b <br>";
        echo 'Swapping a and b using XOR operator...<br>';
        echo "Results: a = $a and b = $b";
    ?>
</body>
</html>