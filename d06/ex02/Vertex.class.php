<?php

Class Vertex {

	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	public static $verbose = false;

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }
	public function getColor() { return $this->_color; }

	public function setX($val) { $this->_x = $val; return; }
	public function setY($val) { $this->_y = $val; return; }
	public function setZ($val) { $this->_z = $val; return; }
	public function setW($val) { $this->_w = $val; return; }
	public function setColor(Color $c) { $this->_color = $c; return; }

	public function __construct(array $kwargs) {
		if (array_key_exists('x', $kwargs) != false && array_key_exists('y', $kwargs) != false && array_key_exists('z', $kwargs) != false)
		{
			$this->_x = $kwargs['x'];
			$this->_y = $kwargs['y'];
			$this->_z = $kwargs['z'];
			if (array_key_exists('w', $kwargs) != false)
				$this->_w = $kwargs['w'];
			else
				$this->_w = 1.0;
			if (array_key_exists('color', $kwargs) != false)
				$this->_color = $kwargs['color'];
			else
				$this->_color = new Color( array('rgb' => 0xffffff) );
		}
		else
			print( 'Invalid paramaters' . PHP_EOL );
		if (self::$verbose == true)
			print( $this . ' constructed' . PHP_EOL );
		return;
	}

	public function __destruct() {
		if (self::$verbose == true)
			print( $this . ' destructed' . PHP_EOL );
		return;
	}

	public static function doc() {
		return PHP_EOL . file_get_contents('Vertex.doc.txt');
	}

	public function __toString() {
		if (self::$verbose == false)
			return sprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )', $this->_x, $this->_y, $this->_z, $this->_w);
		else
			return sprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )', $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
	}

}

?>
