<?php
namespace App\Entity\Staff;

use App\Interface\Staff\StaffProfileInterface;
use App\Repository\Staff\StaffProfileRepository;
use Exception;

class StaffProfileEntity extends StaffProfileRepository implements StaffProfileInterface
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	private int $id;
	private int|null $staffId;
  private string $lastname;
  private string $firstname;
	private int|null $sex;
	private string|null $birthdate;
  private string|null $address;
  private string|null $postalCode;
  private string|null $city;
  private string|null $country;
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //

	final public function __construct(){}
	
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
	 * The getter function "getStaffId"
	 *
	 * @collection StaffEntity
	 * @return StaffEntity
	 */
	final public function getStaffId(): StaffEntity
	{
		if($this->staffId) {
			return $this->findIdCollect($this->staffId, StaffEntity::class);
		}
		return new StaffEntity();
	}
	
	/**
	 * The getter function "getLastname"
	 *
	 * @return string
	 */
  final public function getLastname(): string
  {
    return $this->lastname;
  }
	
	/**
	 * The getter function "getFirstname"
	 *
	 * @return string
	 */
	final public function getFirstname(): string
	{
		return $this->firstname;
	}
	
	/**
	 * The getter function "getSex"
	 *
	 * @return int|null
	 */
	final public function getSex(): ?int
	{
		return $this->sex;
	}
	
	/**
	 * The getter function "getBirthdate"
	 *
	 * @return string|null
	 */
	final public function getBirthdate(): ?string
	{
		return $this->birthdate;
	}
	
	/**
	 * The getter function "getAddress"
	 *
	 * @return string|null
	 */
  final public function getAddress(): ?string
  {
    return $this->address;
  }
	
	/**
	 * The getter function "getPostalCode"
	 *
	 * @return string|null
	 */
  final public function getPostalCode(): ?string
  {
    return $this->postalCode;
  }
	
	/**
	 * The getter function "getCity"
	 *
	 * @return string|null
	 */
  final public function getCity(): ?string
  {
    return $this->city;
  }
	
	/**
	 * The getter function "getCountry"
	 *
	 * @return string|null
	 */
  final public function getCountry(): ?string
  {
    return $this->country;
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
	 * The setter function "setStaffId"
	 *
	 * @param string $staffId
	 * @return $this
	 */
  final public function setStaffId(string $staffId): self
  {
    $this->staffId = $staffId;
    return $this;
  }
	
	/**
	 * The setter function "setLastname"
	 *
	 * @param string $lastname
	 * @return $this
	 */
  final public function setLastname(string $lastname): self
  {
    $this->lastname = $lastname;
    return $this;
  }
	
	/**
	 * The setter function "setFirstname"
	 *
	 * @param string $firstname
	 * @return $this
	 */
  final public function setFirstname(string $firstname): self
  {
    $this->firstname = $firstname ? $firstname : "";
    return $this;
  }
	
	/**
	 * The setter function "setSex"
	 *
	 * @param int|null
	 * @return $this
	 */
	final public function setSex(?int $sex): self
	{
		$this->sex = $sex;
		return $this;
	}
	
	/**
	 * The setter function "setBirthdate"
	 *
	 * @param string|null $birthdate
	 * @return $this
	 */
	final public function setBirthdate(?string $birthdate): self
	{
		$this->birthdate = $birthdate;
		return $this;
	}
	
	/**
	 * The setter function "setAddress"
	 *
	 * @param string|null $address
	 * @return $this
	 */
  final public function setAddress(?string $address): self
  {
	  $this->address = $address;
    return $this;
  }
	
	/**
	 * The setter function "setPostalCode"
	 *
	 * @param string|null $postalCode
	 * @return $this
	 */
  final public function setPostalCode(?string $postalCode): self
  {
    $this->postalCode = $postalCode;
    return $this;
  }
	
	/**
	 * The setter function "setCity"
	 *
	 * @param string|null $city
	 * @return $this
	 */
  final public function setCity(?string $city): self
  {
    $this->city = $city;
    return $this;
  }
	
	/**
	 * The setter function "setCountry"
	 *
	 * @param string|null $country
	 * @return $this
	 */
  final public function setCountry(?string $country): self
  {
    $this->country = $country;
    return $this;
  }

}