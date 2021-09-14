<?php
namespace App\Interface\Staff;

use App\Entity\Staff\StaffProfileEntity;

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
	 * The getter function "getStaffId"
	 *
	 * @collection StaffEntity
	 * @return StaffEntity
	 */
	public function getStaffId(): StaffEntity;
	
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
	
	/**
	 * The getter function "getSex"
	 *
	 * @return int|null
	 */
	public function getSex(): ?int;
	
	/**
	 * The getter function "getBirthdate"
	 *
	 * @return string|null
	 */
	public function getBirthdate(): ?string;
	
	/**
	 * The getter function "getAddress"
	 *
	 * @return string|null
	 */
	public function getAddress(): ?string;
	
	/**
	 * The getter function "getPostalCode"
	 *
	 * @return string|null
	 */
	public function getPostalCode(): ?string;
	
	/**
	 * The getter function "getCity"
	 *
	 * @return string|null
	 */
	public function getCity(): ?string;
	
	/**
	 * The getter function "getCountry"
	 *
	 * @return string|null
	 */
	public function getCountry(): ?string;
	
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
	 * The setter function "setStaffId"
	 *
	 * @param string $staffId
	 * @return $this
	 */
	public function setStaffId(string $staffId): self;
	
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
	
	/**
	 * The setter function "setSex"
	 *
	 * @param int|null
	 * @return $this
	 */
	public function setSex(?int $sex): self;
	
	/**
	 * The setter function "setBirthdate"
	 *
	 * @param string|null $birthdate
	 * @return $this
	 */
	public function setBirthdate(?string $birthdate): self;
	
	/**
	 * The setter function "setAddress"
	 *
	 * @param string|null $address
	 * @return $this
	 */
	public function setAddress(?string $address): self;
	
	/**
	 * The setter function "setPostalCode"
	 *
	 * @param string|null $postalCode
	 * @return $this
	 */
	public function setPostalCode(?string $postalCode): self;
	
	/**
	 * The setter function "setCity"
	 *
	 * @param string|null $city
	 * @return $this
	 */
	public function setCity(?string $city): self;
	
	/**
	 * The setter function "setCountry"
	 *
	 * @param string|null $country
	 * @return $this
	 */
	public function setCountry(?string $country): self;
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
}