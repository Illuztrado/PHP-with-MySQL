<?php

// Create a class called 'HTML_Helper' that has the following two methods:

// print_table -> takes an array that has multiple rows of information (imagine you queried the database and got all the list of users where each row has information like ["first_name" => "Michael", "last_name" => "Choi", "nick_name" => "Sensei"].
// This function takes this multi-dimensional arrays and prints out a beautiful HTML table with all the information in it.
// Make the keys appear in the first row (e.g. First Name, Last Name, Nick Name) and make the values of each row appear in the subsequent rows (e.g. Michael, Choi, Sensei).

class HTML_Helper {
    public $array;
    public $keys;
    public $array_select;
    public $last_name;
    public $nick_name;
    public function print_table($first_name, $last_name, $nick_name)
    {
        if(empty($this->array)) {
            $this->array = array();
        }
        else
        {
        }
        array_push($this->array, array("first_name" => $first_name, "last_name" => $last_name, "nick_name" => $nick_name));
        $this->keys = array_keys($this->array[0]);
        ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="This is the code for the HTML Helper OOP exercise.">
        <title>HTML Helper</title>
        <link rel="stylesheet" type="text/css" href="html-helper-style.css">
    </head>
    <body>
        <table>
            <thead>
                <tr>
<?php           foreach($this->keys as $key)
                {   ?>
                    <th><?= ucwords(str_replace("_", " ", $key)); ?></th>
<?php           }   ?>
                </tr>
            </thead>
            <tbody>
                <tr>
<?php           foreach($this->array as $values)
                {   
                    foreach($values as $value)
                    {   ?>
                        <td><?= $value; ?></td>
<?php               }    
                }   ?>
                </tr>
            </tbody>
        </table>
<?php   return $this;
    }        
// print_select -> as the input, this method takes an array AND the name that should be used for the select tag;
// the method returns a string that is formatted in HTML.
// For example, say that $sample_array = ("CA", "WA", "UT", "TX", "AZ", "NY") and we call print_select("state", $sample_array) method.   
    public function print_select($name, $array)
    {   
        $this->array_select = $array;
        ?>
        <label><?= $name; ?></label>
            <select name="<?= $name; ?>">
<?php       foreach($this->array_select as $value)
            {   ?>
                <option><?= $value; ?></option>
<?php       }   ?>
            </select>
<?php
    }
}   ?>
    </body>
</html>

<?php

$table1 = new HTML_Helper();
$table1->print_table("Georges", "St. Pierre", "GSP");

$table2 = new HTML_Helper();
$table2->print_table("Tony", "Ferguson", "The Boogeyman");

$table3 = new HTML_Helper();
$table3->print_table("Khabib", "Nurmagomedov", "The Eagle");
echo"<br>";

$select1 = new HTML_Helper();
$select1->print_select("States", array("CA", "WA", "UT", "TX", "AZ", "NY"));

?>
