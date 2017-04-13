<?php

require_once 'Color.class.php';

Class Matrix {


	private $_vtcX;
	private $_vtcY;
	private $_vtcZ;
	private $_vtxO;
	private $_type;

	const IDENTITY = 'IDENTITY';
	const SCALE = 'SCALE preset';
	const RX = 'Ox ROTATION preset';
	const RY = 'Oy ROTATION preset';
	const RZ = 'Oz ROTATION preset';
	const TRANSLATION = 'TRANSLATION preset';
	const PROJECTION = 'PROJECTION preset';

	public static $verbose = false;

	/*public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }*/
	public function getType() { return $this->_type; }

	public function __construct(array $kwargs) {
		if (array_key_exists('preset', $kwargs) == false)
			print( 'Matrix: Invalid paramaters' . PHP_EOL );
		else
		{
			if ($kwargs['preset'] == self::SCALE && array_key_exists('scale', $kwargs))
			{
				$this->_vtcX = new Vector( array( 'dest' => new Vertex(array('x' => $kwargs['scale'], 'y' => 0, 'z' => 0)) ) );
				$this->_vtcY = new Vector( array( 'dest' => new Vertex(array('x' => 0, 'y' => $kwargs['scale'], 'z' => 0)) ) );
				$this->_vtcZ = new Vector( array( 'dest' => new Vertex(array('x' => 0, 'y' => 0, 'z' => $kwargs['scale'])) ) );
				$this->_vtxO = new Vertex( array('x' => 0, 'y' => 0, 'z' => 0) );
				$this->_type = 1;
			}
			else if (($kwargs['preset'] == self::RX || $kwargs['preset'] == self::RY || $kwargs['preset'] == self::RZ) && array_key_exists('angle', $kwargs))
			{
				if ($kwargs['preset'] == self::RX)
				{
					$this->_vtcX = new Vector( array( 'dest' => new Vertex(array('x' => 1, 'y' => 0, 'z' => 0)) ) );
					$this->_vtcY = new Vector( array( 'dest' => new Vertex(array('x' => 0, 'y' => cos($kwargs['angle']), 'z' => sin($kwargs['angle']) )) ) );
					$this->_vtcZ = new Vector( array( 'dest' => new Vertex(array('x' => 0, 'y' => -sin($kwargs['angle']), 'z' => cos($kwargs['angle']) )) ) );
					$this->_type = 2;
				}
				else if ($kwargs['preset'] == self::RY)
				{
					$this->_vtcX = new Vector( array( 'dest' => new Vertex(array('x' => cos($kwargs['angle']), 'y' => 0, 'z' => -sin($kwargs['angle']) )) ) );
					$this->_vtcY = new Vector( array( 'dest' => new Vertex(array('x' => 0, 'y' => 1, 'z' => 0)) ) );
					$this->_vtcZ = new Vector( array( 'dest' => new Vertex(array('x' => sin($kwargs['angle']), 'y' => 0, 'z' => cos($kwargs['angle']) )) ) );
					$this->_type = 3;
				}
				else if ($kwargs['preset'] == self::RZ)
				{
					$this->_vtcX = new Vector( array( 'dest' => new Vertex(array('x' => cos($kwargs['angle']), 'y' => sin($kwargs['angle']), 'z' => 0)) ) );
					$this->_vtcY = new Vector( array( 'dest' => new Vertex(array('x' => -sin($kwargs['angle']), 'y' => cos($kwargs['angle']), 'z' => 0)) ) );
					$this->_vtcZ = new Vector( array( 'dest' => new Vertex(array('x' => 0, 'y' => 0, 'z' => 1)) ) );
					$this->_type = 4;
				}
				$this->_vtxO = new Vertex( array('x' => 0, 'y' => 0, 'z' => 0) );
			}
			else if ($kwargs['preset'] == self::TRANSLATION && array_key_exists('vtc', $kwargs))
			{
				$vtc = $kwargs['vtc'];
				$this->_vtcX = new Vector( array( 'dest' => new Vertex(array('x' => 1, 'y' => 0, 'z' => 0)) ) );
				$this->_vtcY = new Vector( array( 'dest' => new Vertex(array('x' => 0, 'y' => 1, 'z' => 0)) ) );
				$this->_vtcZ = new Vector( array( 'dest' => new Vertex(array('x' => 0, 'y' => 0, 'z' => 1)) ) );
				$this->_vtxO = new Vertex( array('x' => $vtc->getX(), 'y' => $vtc->getY(), 'z' => $vtc->getZ()) );
				$this->_type = 5;
			}
			else if ($kwargs['preset'] == self::PROJECTION && array_key_exists('fov', $kwargs) && array_key_exists('ratio', $kwargs)
				&& array_key_exists('near', $kwargs) && array_key_exists('far', $kwargs))
			{
				$fov = deg2rad($kwargs['fov']);
				$ratio = $kwargs['ratio'];
				$near = $kwargs['near'];
				$far = $kwargs['far'];
				$this->_vtcX = new Vector( array( 'dest' => new Vertex(array('x' => 1 / ($ratio * tan($fov / 2)) , 'y' => 0, 'z' => 0)) ) );
				$this->_vtcY = new Vector( array( 'dest' => new Vertex(array('x' => 0, 'y' => 1 / tan($fov / 2), 'z' => 0)) ) );
				$this->_vtcZ = new Vector( array( 'dest' => new Vertex(array('x' => 0, 'y' => 0, 'z' => ($near + $far) / ($near - $far))), 'w' => -1) );
				$this->_vtxO = new Vertex( array('x' => 0, 'y' => 0, 'z' => (2 * $far * $near) / ($near - $far), 'w' => 0) );
				$this->_type = 6;
			}
			else if ($kwargs['preset'] == self::IDENTITY)
			{
				$this->_vtcX = new Vector( array( 'dest' => new Vertex(array('x' => 1, 'y' => 0, 'z' => 0)) ) );
				$this->_vtcY = new Vector( array( 'dest' => new Vertex(array('x' => 0, 'y' => 1, 'z' => 0)) ) );
				$this->_vtcZ = new Vector( array( 'dest' => new Vertex(array('x' => 0, 'y' => 0, 'z' => 1)) ) );
				$this->_vtxO = new Vertex( array('x' => 0, 'y' => 0, 'z' => 0) );
				$this->_type = 0;
			}
			else
				print( 'Matrix: Invalid paramaters' . PHP_EOL );
		}
		if (self::$verbose == true)
			print( 'MATRIX ' . $kwargs['preset'] . ' instance constructed' . PHP_EOL );
		return;
	}

	public function __destruct() {
		if (self::$verbose == true)
			print( 'Matrix instance destructed' . PHP_EOL );
		return;
	}

	public static function doc() {
		return PHP_EOL . file_get_contents('Matrix.doc.txt');
	}

	public function __toString() {
		$l1 = 'M | vtcX | vtcY | vtcZ | vtxO' . PHP_EOL;
		$l2 = '-----------------------------' . PHP_EOL;
		$l3 = sprintf('x | %.2f | %.2f | %.2f | %.2f', $this->_vtcX->getX(), $this->_vtcY->getX(), $this->_vtcZ->getX(), $this->_vtxO->getX()) . PHP_EOL;
		$l4 = sprintf('y | %.2f | %.2f | %.2f | %.2f', $this->_vtcX->getY(), $this->_vtcY->getY(), $this->_vtcZ->getY(), $this->_vtxO->getY()) . PHP_EOL;
		$l5 = sprintf('z | %.2f | %.2f | %.2f | %.2f', $this->_vtcX->getZ(), $this->_vtcY->getZ(), $this->_vtcZ->getZ(), $this->_vtxO->getZ()) . PHP_EOL;
		$l6 = sprintf('w | %.2f | %.2f | %.2f | %.2f', $this->_vtcX->getW(), $this->_vtcY->getW(), $this->_vtcZ->getW(), $this->_vtxO->getW());
		return $l1 . $l2 . $l3 . $l4 . $l5 . $l6;
	}

	public function mult(Matrix $rhs) {
		$type = $rhs->getType();
		if ($type == 0)
			return clone $this;
		else if ($type == 1)
			new Matrix( array('prest' => self::IDENTITY) );
	}

}

?>
