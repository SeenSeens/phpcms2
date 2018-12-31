<?php
/* $now = new DateTime(); 
$now2 = new DateTime(); 
$ago = new DateInterval('P4Y10M3W'); 
$ago2 = new DateInterval('P4Y10M2W7D'); 
$then = $now->sub($ago); 
$date1 = $then->format('Y-m-d'); 
$then2 = $now2->sub($ago2); 
$date2 = $then2->format('Y-m-d'); 
var_dump ($date1 === $date2);  */


/*  namespace animals;
 ini_set('error_reporting', E_ALL);
 ini_set('display_errors', 'on');
 class Cat
 {
 static function Definition()
 {
 return 'Cats are ' . __NAMESPACE__;
 }
 }
 namespace animals\pets;
 class Cat
 {
 static function Definition()
 {
 return 'Cats are ' . __NAMESPACE__;
 }
 }
 echo Cat::Definition(); */ 

/* class foo 
{ 
private $variable; 
function __construct() 
{ 
$this->variable = 1; 
} 
function __get($name) 
{ 
return $this->$name; 
} 
} 
$a = new foo; 
echo $a->variable;  */

/* class AppException extends Exception
{
function __toString()
{
return "Your code has just thrown an exception: {$this->message}\n";
}
}
class Students
{
public $first_name;
public $last_name;
public function __construct($first_name, $last_name)
{
if(empty($first_name))
{
throw new AppException('First Name is required', 1);
}
if(empty($last_name))
{
throw new AppException('Last Name is required', 2);
}
}
}
try {
new Students('', '');
} catch (Exception $e) {
echo $e;
} */


/* class someclass
{
public $someprop;
function __construct()
{
$this->someprop = 1;
}
}
function somefunc(&$instance) {
unset($instance);
}
$instance = new someclass;
somefunc($instance);
var_dump($instance); */


/* $a = array('one'=>'php', 'two'=>'javascript', 'three'=>'python');
$b = array('python', 'javascript', 'php');
if(array_values(array_reverse($a)) === $b)
echo 'true';
else
echo 'false'; */

/* $people = array(""Peter"", ""Susan"", ""Edmund"", ""Lucy"");
echo pos($people); */


/* $str = true ? '01' : false ? '10' : '11';
var_dump($str); */

/* $str = "'Adam<td>Smith</td>is really<i>a geek</i>!';
$str = strip_tags($str,""<i></i>""); */

/* namespace CustomArea;
error_reporting(E_ALL);
ini_set("display_errors", "on");
function var_dump($a)
{
return str_replace("Weird", $a, "Weird stuff can happen");
}
$a = "In programming";
echo var_dump($a); */


/* $myarray = array(
null => 'ready',
true => 'steady',
false => 'start',
0 => 'stop',
1 => 'go',
' ' => 'flow'
);
echo count($myarray), "\n"; */


/* class entity {
public $name;
}
$human = new entity();
$dog = new entity();
$human->name = 0;
$dog->name = "";

var_dump($human); */


/* $string = 'a\\b\n'; 

echo $string; */

/* $people = array(""Peter"", ""Susan"", ""Edmund"", ""Lucy"");
echo pos($people); */

/* class subject {}

    class exam{}
    
    class result extends subject, exams {} */


/* function constant()
{
define("HELLO", "Welcome to Bangalore");
echo hello;
} */