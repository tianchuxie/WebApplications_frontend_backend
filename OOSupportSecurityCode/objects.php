<?php
	class Person {
		private $name;
		private $address;
	
		public function __construct($pname, $address) {
			$this->name = $pname;		// Notice this->name (no $ for name)
			$this->address = $address;  // We need $this-> to refer to data members
		}
	
		public function __toString() {
			return "<b>Name:</b> ".$this->name.", <b>Address:</b> ".$this->address;		
		}

		public function getName() {
			return $this->name;
		}
	
		public function getAddress() {
			return $this->address;
		}
	
		public function __destruct() {
			echo "Person __destruct called<br />";
		}
		
		public function getInfo() {
			echo "Class Information: ", get_class($this);
		}
	}

	/* Student class */
	class Student extends Person {
		private $gpa;
		const MAXGPA = 4.0;
	
		public function __construct($name, $address, $gpa) {
			parent::__construct($name, $address);
			$this->gpa = $gpa;
		}
	
		public function __toString() {
			$personStr = parent::__toString();
			return $personStr.", <b>Gpa: ".$this->gpa." MAXGPA: ".Student::MAXGPA."</b>"; 				
		}
		
		public static function printMAXGPA() {
			echo "MAXGPA value: ", self::MAXGPA;   /* Notice use of self */
		}
	}

	/* Athlete interface */
	interface Athlete {
		public function getSport();
	}

	/* StudentAthlete class */
	class StudentAthlete extends Student implements Athlete {
		static $totalAthletes = 0;
		private $sport;
	
		public function __construct($name, $address, $gpa, $sport) {
			parent::__construct($name, $address, $gpa);
			$this->sport = $sport;
			StudentAthlete::$totalAthletes++;
		}
	
		public function getSport() {
			return $this->sport;
		}
	
		public function __toString() {
			$studentStr = parent::__toString();
			return $studentStr.", <b>Sport: ".$this->sport."</b>";
		}
		
		public static function maxSalary() {
			return "50000";
		}
	}

	/**** Driver ****/
	$p1 = new Person("John", "Far from here");
	print $p1->getName();
	print $p1->getAddress();
	print "<br />";
	print "$p1<hr />";
	$p1->getInfo();
	print "<hr />";
	
	
	print "Creating a student object<br />";
	$s1 = new Student("Rose", "Bethesda", 3.6);
	print "$s1<hr />";
	$s1->printMAXGPA();
	print "<hr />";
	
	print "Creating athlete objects<br />";
	$sa1 = new StudentAthlete("Tom", "Silver Spring", 3.0, "Basketball");
	print "$sa1<hr />";
	
	$sa2 = new StudentAthlete("Rose", "College Park", 4.0, "Soccer");
	print "$sa2<hr />";
	print "Total Athletes: ".StudentAthlete::$totalAthletes."<br />";
	
	print "MaxSalary: ".StudentAthlete::maxSalary()."<br />";
?>