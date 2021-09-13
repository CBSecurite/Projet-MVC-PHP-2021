<?php
namespace App\Entity\Staff;

use App\Interface\Staff\StaffRoleInterface;
use App\Repository\Staff\StaffRoleRepository;

class StaffRoleEntity extends StaffRoleRepository implements StaffRoleInterface
{
	
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
  private int $id;
  private string $name;
  private int $priority;
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //
	
	final public function __construct()
	{
	}
	
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	/**
	 * The getter function "getId"
	 *
	 * @return int
	 */
  final public function getId(): int
  {
    return $this->id;
  }
	
	/**
	 * The getter function "getName"
	 *
	 * @return string
	 */
  final public function getName(): string
  {
    return $this->name;
  }
	
	/**
	 * The getter function "getPriority"
	 *
	 * @return int
	 */
  final public function getPriority(): int
  {
    return $this->priority;
  }
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * The getter function "setId"
	 *
	 * @param int $id
	 * @return $this
	 */
	final public function setId(int $id): self
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * The setter function "setName"
	 *
	 * @param string $name
	 * @return $this
	 */
  final public function setName(string $name): self
  {
    $this->name = $name;
    return $this;
  }
	
	/**
	 * The setter function "setPriority"
	 *
	 * @param int $priority
	 * @return $this
	 */
  final public function setPriority(int $priority): self
  {
    $this->priority = $priority;
    return $this;
  }
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //

}