<?php
	class Doctor {
		private $name;
		private $age;
		private $salary;
		
		public function __construct($name, $age, $salary) {
			$this->name = $name;
			$this->age = $age;
			$this->salary = $salary;
		}
		
		public function __toString() {
			return "Name: $this->name, Age: $this->age, Salary: $this->salary";
		}
		
	}

	echo "<strong>Original Array</strong><br />";
	for ($i = 100, $x=1; $i <= 104; $i++, $x++) {
		$cutoffs[$i] = 10 + $x;
		print($cutoffs[$i]."<br />");
	}

	$serializedData = serialize($cutoffs);
	echo "<strong>Contents of serialized array</strong><br />";
	echo "$serializedData<br />";
	
	echo "<strong>Unserialized Array</strong><br />";
	$unserializedData = unserialize($serializedData);
	foreach ($unserializedData as $entry)
		print($entry."<br />");
		
	echo "<strong>Original Object</strong><br />";
	$doctor = new Doctor("Tom", 34, 10000);
	echo "$doctor<br />";
	$serializedDoctor = serialize($doctor);
	echo "<strong>Contents of serialized doctor</strong><br />";
	echo "$serializedDoctor<br />";	
	
	$unserializedDoctor = unserialize($serializedDoctor);
	echo "<strong>Contents of unserialized doctor</strong><br />";
	echo "$unserializedDoctor<br />";
?>