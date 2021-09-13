<?php
namespace App\Interface\Staff;

interface StaffProfileInterface
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
	 * The getter function "getLastname"
	 *
	 * @return string
	 */
	public function getLastname(): string;
	
	/**
	 * The getter function "getFirstname"
	 *
	 * @return string
	 */
	public function getFirstname(): string;
	
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
	 * The setter function "setLastname"
	 *
	 * @param string $lastname
	 * @return $this
	 */
	public function setLastname(string $lastname): self;
	
	/**
	 * The setter function "setFirstname"
	 *
	 * @param string $firstname
	 * @return $this
	 */
	public function setFirstname(string $firstname): self;
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
}