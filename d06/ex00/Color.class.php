<?php

Class Color {

	public $red;
	public $green;
	public $blue;
	public static $verbose = false;

	public function __construct(array $kwargs) {
		if (array_key_exists('red', $kwargs) != false && array_key_exists('green', $kwargs) != false && array_key_exists('blue', $kwargs) != false)
		{
			$this->red = intval($kwargs['red']);
			$this->green = intval($kwargs['green']);
			$this->blue = intval($kwargs['blue']);
		}
		else if (array_key_exists('rgb', $kwargs) != false)
		{
			$this->red = intval($kwargs['rgb']) >> 16;
			$this->green = intval($kwargs['rgb']) >> 8 & 0xff;
			$this->blue = intval($kwargs['rgb']) & 0xff;
		}
		else
			print( 'Invalid paramaters' . PHP_EOL );
		if (self::$verbose == true)
			print( $this . ' constructed.' . PHP_EOL );
		return;
	}

	public function __destruct() {
		if (self::$verbose == true)
			print( $this . ' destructed.' . PHP_EOL );
		return;
	}

	public static function doc() {
		return PHP_EOL . file_get_contents('Color.doc.txt');
	}

	public function __toString() {
		return sprintf('Color( red: %3d, green: %3d, blue: %3d )', $this->red, $this->green, $this->blue);
	}

	public function add(Color $instance) {
		return new Color( array('red' => $this->red + $instance->red, 'green' => $this->green + $instance->green, 'blue' => $this->blue + $instance->blue) );
	}

	public function sub(Color $instance) {
		return new Color( array('red' => $this->red - $instance->red, 'green' => $this->green - $instance->green, 'blue' => $this->blue - $instance->blue) );
	}

	public function mult($coeff) {
		return new Color( array('red' => $this->red * $coeff, 'green' => $this->green * $coeff, 'blue' => $this->blue * $coeff) );
	}

}

?>
