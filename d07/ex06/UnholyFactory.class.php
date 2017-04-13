<?php

class UnholyFactory {

	private $_members = array();

	public function absorb($perso) {
		if ($perso instanceof Fighter)
		{
			if (in_array($perso, $this->_members))
				print('(Factory already absorbed a fighter of type ' . $perso->name . ')' . PHP_EOL);
			else
			{
				$this->_members[] = $perso;
				print('(Factory absorbed a fighter of type ' . $perso->name . ')' . PHP_EOL);
			}
		}
		else
			print('(Factory can\'t absorb this, it\'s not a fighter)' . PHP_EOL);
	}

	public function fabricate($name) {
		foreach ($this->_members as $elem)
		{
			if ($elem->name == $name)
			{
				print('(Factory fabricates a fighter of type ' . $name . ')' . PHP_EOL);
				return new $elem;
			}
		}
		print('(Factory hasn\'t absorbed any fighter of type ' . $name . ')' . PHP_EOL);
		return NULL;
	}
}

?>
