<?php
	class Cog {

		private $counter;
		private $alphabetMap;
		private $cogMap;
		private $nextCog;

		public function __construct($type, $initValue, $nextCog = NULL) {
			$this->nextCog = $nextCog;
			$this->setCounter($initValue);
			$this->alphabetMap = range('a', 'z');
			$this->setType($type);
		}

		public function output($input) {
			if (is_string($input)) {
				if (is_numeric($input)) { 
					$input = (int) $input;
				} else {
					$input = array_search($input[0], $this->alphabetMap);
				}
			}
			$input += $this->counter; // shifts the input by counter;
			$input %= 26;
			$value = $this->alphabetMap[$input];

			// Turn Cog after each output.
			if ((isset($this->nextCog)) && ($this->counter == 25)) {
				$this->nextCog->updateCounter();
			} else {
				$this->updateCounter();
			}

			return $this->cogMap[$value];
		}

		public function getCounter() {
			return $this->counter;
		}

		public function updateCounter() {
			$counter = $this->counter + 1;
			$this->setCounter($counter);
		}

		private function setType($type) {
			switch($type) {
				case 'I':
				case '1':
				$this->cogMap = array("a" => "l", "b" => "p", "c" => "g", "d" => "s", "e" => "z", 
						      "f" => "m", "g" => "h", "h" => "a", "i" => "e", "j" => "o", 
						      "k" => "q", "l" => "k", "m" => "v", "n" => "x", "o" => "r", 
						      "p" => "f", "q" => "y", "r" => "b", "s" => "u", "t" => "t", 
						      "u" => "n", "v" => "i", "w" => "c", "x" => "j", "y" => "d", 
						      "z" => "w");
				break;
				case 'II':
				case '2':
				$this->cogMap = array("a" => "s", "b" => "l", "c" => "v", "d" => "g", "e" => "b", 
						      "f" => "t", "g" => "f", "h" => "x", "i" => "j", "j" => "q", 
						      "k" => "o", "l" => "h", "m" => "e", "n" => "w", "o" => "i", 
						      "p" => "r", "q" => "z", "r" => "y", "s" => "a", "t" => "m", 
						      "u" => "k", "v" => "p", "w" => "c", "x" => "n", "y" => "d", 
						      "z" => "u");
				break;
				case 'III':
				case '3':
				$this->cogMap = array("a" => "c", "b" => "j", "c" => "g", "d" => "d", "e" => "p", 
						      "f" => "s", "g" => "h", "h" => "k", "i" => "t", "j" => "u", 
						      "k" => "r", "l" => "a", "m" => "w", "n" => "z", "o" => "x", 
						      "p" => "f", "q" => "m", "r" => "y", "s" => "n", "t" => "q", 
						      "u" => "o", "v" => "b", "w" => "v", "x" => "l", "y" => "i", 
						      "z" => "e");
				break;
			}

		}

		private function setCounter($int) {
			$this->counter = $int % 26;
		}
	}
?>
