<?php
namespace App\Repository\Staff;

use Core\Repository\CoreRepository;
use Exception;

class StaffProfileRepository extends CoreRepository
{
	/**
	 * The getter function "getAge"
	 *
	 * @return ?string
	 * @throws Exception
	 */
	final public function getAge(): ?string
	{
		return $this->dateDiffYear($this->getBirthdate());
	}

}