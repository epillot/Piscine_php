<?php

class NightsWatch implements Ifighter{

	private $_members = array();

	public function fight() {
		foreach ($this->_members as $fighter)
			$fighter->fight();
	}

	public function recruit($perso) {
		if ($perso instanceof Ifighter)
			$this->_members[] = $perso;
	}

}

?>
