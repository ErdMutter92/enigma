<?php

	require('./cog.php');

	class Enigma {

		private $cogSlots;

		private function isCogSlotsFull() {
			if (count($this->cogSlots) >= 3) {
				return True;
			} else {
				return False;
			}
		}
	
		public function addCog($type, $initValue) {
			if (!$this->isCogSlotsFull()) {
				$this->cogSlots[] = new Cog($type, $initValue);
			}
		}

		public function getCogSlots() {
			print_r($this->cogSlots);
		}

		public function encrypt($string) {
			if ($this->isCogSlotsFull()) {
				echo count(str_split($string));
			}
		}
		
	}

	$tmp = new Enigma();
	$tmp->addCog('1', '0');
	$tmp->addCog('3', '0');
	$tmp->addCog('2', '0');
	$tmp->getCogSlots();
	echo '<br /><br />';
	$tmp->encrypt('Hello, World!');

?>
