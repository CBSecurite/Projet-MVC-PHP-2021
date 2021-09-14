<?php
namespace App\Interface\Staff;

interface StaffRoleInterface
{
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	/**
	 * The getter function "getId"
	 *
	 * @return int
	 */
	public function getId(): int;
	
	/**
	 * The getter function "getName"
	 *
	 * @return string
	 */
	public function getName(): string;
	
	/**
	 * The getter function "getPriority"
	 *
	 * @return int
	 */
	public function getPriority(): int;
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * The getter function "setId"
	 *
	 * @param int $id
	 * @return $this
	 */
	public function setId(int $id): self;
	
	/**
	 * The setter function "setName"
	 *
	 * @param string $name
	 * @return $this
	 */
	public function setName(string $name): self;
	
	/**
	 * The setter function "setPriority"
	 *
	 * @param int $priority
	 * @return $this
	 */
	public function setPriority(int $priority): self;
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
}