<?php
	class Student {
		public $name;
		public $id;
		public $gpa;
		var $year;
	}


	$s1 = new Student();
	$s1->name = "Mary Sanders";
	$s1->id = 101;
	$s1->gpa = 3.6;
	$s1->year = "Senior";

	print "Name:$s1->name<br />";
	print "Id: $s1->id<br />";
	print "Gpa:$s1->gpa<br />";
	print "Year:$s1->year<br />";
?>