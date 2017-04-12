<?php

require_once 'Color.class.php';

Class Vector {

	private $_x;
	private $_y;
	private $_z;
	private $_w;
	public static $verbose = false;

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }

	public function __construct(array $kwargs) {
		if (array_key_exists('dest', $kwargs) != false)
		{
			$dest = $kwargs['dest'];
			if (array_key_exists('orig', $kwargs) != false)
				$orig = $kwargs['orig'];
			else
				$orig = new Vertex( array( 'x' => 0, 'y' => 0, 'z' => 0) );
			$this->_x = $dest->getX() - $orig->getX();
			$this->_y = $dest->getY() - $orig->getY();
			$this->_z = $dest->getZ() - $orig->getZ();
			if (array_key_exists('w', $kwargs) != false)
				$this->_w = $kwargs['w'];
			else
				$this->_w = 0.0;
		}
		else
			print( 'Vector: Invalid paramaters' . PHP_EOL );
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
		return PHP_EOL . file_get_contents('Vector.doc.txt');
	}

	public function __toString() {
		return sprintf('Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )', $this->_x, $this->_y, $this->_z, $this->_w);
	}

	public function magnitude() {
		return sqrt($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z);
	}

	public function normalize() {
		$dest = new Vertex( array( 'x' => $this->_x / $this->magnitude(), 'y' => $this->_y / $this->magnitude(), 'z' => $this->_z / $this->magnitude() ) );
		return new Vector( array( 'dest' => $dest ) );
	}

	public function add(Vector $rhs) {
		$dest = new Vertex( array( 'x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z ) );
		return new Vector( array( 'dest' => $dest ) );
	}

	public function sub(Vector $rhs) {
		$dest = new Vertex( array( 'x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z ) );
		return new Vector( array( 'dest' => $dest ) );
        }

	public function opposite() {
		$dest = new Vertex( array( 'x' => -$this->_x, 'y' => -$this->_y, 'z' => -$this->_z ) );
		return new Vector( array( 'dest' => $dest ) );
        }
	
	public function scalarProduct($k) {
		$dest = new Vertex( array( 'x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k ) );
		return new Vector( array( 'dest' => $dest ) );
        }

	public function dotProduct(Vector $rhs) {
		return $this->_x * $rhs->_x + $this->_y * $rhs->_y + $this->_z * $rhs->_z;
	}

	public function cos(Vector $rhs) {
                return $this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude());
        }

	public function crossProduct(Vector $rhs) {
		$x = $this->_y * $rhs->_z - $this->_z * $rhs->_y;
		$y = $this->_z * $rhs->_x - $this->_x * $rhs->_z;
		$z = $this->_x * $rhs->_y - $this->_y * $rhs->_x;
		$dest = new Vertex( array( 'x' => $x, 'y' => $y, 'z' => $z ) );
		return new Vector( array( 'dest' => $dest ) );
        }
}

?>
