<?php
namespace App\Interface\Staff;

use App\Entity\Staff\StaffRoleEntity;

interface StaffInterface
{
	// ########################################################################################################## //
	// List of Getters about variables //
	// ########################################################################################################## //
	
	/**
	 * The getter function "getId"
	 *
	 * @return int|null
	 */
	public function getId(): ?int;
	
	/**
	 * The getter function "getEmail"
	 *
	 * @return string|null
	 */
	public function getEmail(): ?string;
	
	/**
	 * The getter function "getUsername"
	 *
	 * @return string|null
	 */
	public function getUsername(): ?string;
	
	/**
	 * The getter function "getPassword"
	 *
	 * @return string|null
	 */
	public function getPassword(): ?string;
	
	/**
	 * The getter function "getRightAccess"
	 *
	 * @return int|null
	 */
	public function getRightAccess(): ?int;
	
	/**
	 * The getter function "getStatus"
	 *
	 * @return int|null
	 */
	public function getStatus(): ?int;
	
	/**
	 * The getter function "getStaffRoleId"
	 *
	 * @collection StaffRoleEntity
	 * @return StaffRoleEntity
	 */
	public function getStaffRoleId(): StaffRoleEntity;
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * The setter function "setId"
	 *
	 * @param int $id
	 * @return $this
	 */
	public function setId(int $id): self;
	
	/**
	 * The getter function "setEmail"
	 *
	 * @param string $email
	 * @return $this
	 */
	public function setEmail(string $email): self;
	
	/**
	 * The getter function "setUsername"
	 *
	 * @param string $username
	 * @return $this
	 */
	public function setUsername(string $username): self;
	
	/**
	 * The getter function "setPassword"
	 *
	 * @param string $password
	 * @return $this
	 */
	public function setPassword(string $password): self;
	
	/**
	 * The getter function "setRightAccess"
	 *
	 * @param string $rightAccess
	 * @return $this
	 */
	public function setRightAccess(int $rightAccess): self;
	
	/**
	 * The getter function "setStatus"
	 *
	 * @param string $status
	 * @return $this
	 */
	public function setStatus(int $status): self;
	
	/**
	 * The getter function "setStaffRoleId"
	 *
	 * @param string $staffRoleId
	 * @return $this
	 */
	public function setStaffRoleId(int $staffRoleId): self;
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
}