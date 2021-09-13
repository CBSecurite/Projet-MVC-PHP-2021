<?php
namespace App\Entity\Staff;

use App\Interface\Staff\StaffInterface;
use App\Repository\Staff\StaffRepository;

class StaffEntity extends StaffRepository implements StaffInterface
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
  private int $id;
  private string $email;
  private string $username;
  private string $password;
  private string $rightAccess;
  private string $status;
  private int $staffProfileId;
  private int $staffRoleId;
  private int $staffSalaryId;
  private int $staffPoleId;
	
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
	 * The getter function "getEmail"
	 *
	 * @return string
	 */
	final public function getEmail(): string
	{
		return $this->email;
	}
	
	/**
	 * The getter function "getUsername"
	 *
	 * @return string
	 */
	final public function getUsername(): string
	{
		return $this->username;
	}
	
	/**
	 * The getter function "getPassword"
	 *
	 * @return string
	 */
	final public function getPassword(): string
	{
		return $this->password;
	}
	
	/**
	 * The getter function "getRightAccess"
	 *
	 * @return int
	 */
	final public function getRightAccess(): int
	{
		return $this->rightAccess;
	}
	
	/**
	 * The getter function "getStatus"
	 *
	 * @return int
	 */
	final public function getStatus(): int
	{
		return $this->status;
	}
	
	/**
	 * The getter function "getStaffProfileId"
	 *
	 * @collection StaffProfileEntity
	 * @return Object
	 */
	final public function getStaffProfileId(): Object
	{
		if($this->staffProfileId) {
			return $this->findIdCollect($this->staffProfileId, StaffProfileEntity::class);
		}
		return new StaffProfileEntity();
	}
	
	/**
	 * The getter function "getStaffRoleId"
	 *
	 * @collection StaffRoleEntity
	 * @return Object
	 */
	final public function getStaffRoleId(): Object
	{
		if($this->staffRoleId) {
			return $this->findIdCollect($this->staffRoleId, StaffRoleEntity::class);
		}
		return new StaffRoleEntity();
	}

	/**
	 * The getter function "getStaffSalaryId"
	 *
	 * @collection StaffSalaryEntity
	 * @return Object
	 */
	final public function getStaffSalaryId(): Object
	{
		if($this->staffSalaryId) {
			return $this->findIdCollect($this->staffSalaryId, StaffSalaryEntity::class);
		}
		return new StaffSalaryEntity();
	}
	
	/**
	 * The getter function "getStaffPoleId"
	 *
	 * @collection StaffPoleEntity
	 * @return Object
	 */
	final public function getStaffPoleId(): Object
	{
		if($this->staffPoleId) {
			return $this->findIdCollect($this->staffPoleId, StaffPoleEntity::class);
		}
		return new StaffPoleEntity();
	}
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * The setter function "setId"
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
	 * The getter function "setEmail"
	 *
	 * @param string $email
	 * @return $this
	 */
	final public function setEmail(string $email): self
	{
		$this->email = $email;
		return $this;
	}
	
	/**
	 * The getter function "setUsername"
	 *
	 * @param string $username
	 * @return $this
	 */
	final public function setUsername(string $username): self
	{
		$this->username = $username;
		return $this;
	}
	
	/**
	 * The getter function "setPassword"
	 *
	 * @param string $password
	 * @return $this
	 */
	final public function setPassword(string $password): self
	{
		$this->password = $password;
		return $this;
	}
	
	/**
	 * The getter function "setRightAccess"
	 *
	 * @param string $rightAccess
	 * @return $this
	 */
	final public function setRightAccess(int $rightAccess): self
	{
		$this->rightAccess = $rightAccess;
		return $this;
	}
	
	/**
	 * The getter function "setStatus"
	 *
	 * @param string $status
	 * @return $this
	 */
	final public function setStatus(int $status): self
	{
		$this->status = $status;
		return $this;
	}
	
	/**
	 * The getter function "setStaffProfileId"
	 *
	 * @param string $staffProfileId
	 * @return $this
	 */
	final public function setStaffProfileId(int $staffProfileId): self
	{
		$this->staffProfileId = $staffProfileId;
		return $this;
	}
	
	/**
	 * The getter function "setStaffRoleId"
	 *
	 * @param string $staffRoleId
	 * @return $this
	 */
	final public function setStaffRoleId(int $staffRoleId): self
	{
		$this->staffRoleId = $staffRoleId;
		return $this;
	}
	
	/**
	 * The getter function "setStaffSalaryId"
	 *
	 * @param string $staffSalaryId
	 * @return $this
	 */
	final public function setStaffSalaryId(int $staffSalaryId): self
	{
		$this->staffSalaryId = $staffSalaryId;
		return $this;
	}
	
	/**
	 * The getter function "setStaffPoleId"
	 *
	 * @param string $staffPoleId
	 * @return $this
	 */
	final public function setStaffPoleId(int $staffPoleId): self
	{
		$this->staffPoleId = $staffPoleId;
		return $this;
	}
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //

}