<?php

	require('./cog.php');


	class Enigma {

		private $cog1, $cog2, $cog3;

		public function __construct($cog1, $cog2, $cog3) {
			$this->cog1 = $cog1;
			$this->cog2 = $cog2;
			$this->cog3 = $cog3;
		}

		public function encrypt($string) {
			$string = preg_replace("/[^A-Za-z]/", '', $string);
			$string = strToLower($string);
			$strAsArray = str_split($string);

			$tmpString = '';

			foreach ($strAsArray as $char) {
				$tmpString = $tmpString . $this->cog3->output($this->cog2->output($this->cog1->output($char)));
			}

			echo $tmpString;
		}

		public function decrypt() {
			
		}
		
	}

	$cog1 = new Cog('I', '0');
	$cog2 = new Cog('III', '0', $cog1);
	$cog3 = new Cog('II', '0', $cog2);
	$tmp = new Enigma($cog1, $cog2, $cog3);
	$tmp->encrypt('Hello, World! Hello, World! Hello, World! Hello, World! Hello, World! Hello, World! ');


?>
