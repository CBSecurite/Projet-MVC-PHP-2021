<?php
namespace App\Entity\Staff;

use App\Interface\Staff\StaffSalaryInterface;
use App\Repository\Staff\StaffSalaryRepository;

class StaffSalaryEntity extends StaffSalaryRepository implements StaffSalaryInterface
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
  private string $id;
  private string $dateEntry;
  private float $salaryBase;
  private float $bonus;
  private float $penalty;
  private float $seniorityRate;
	
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
	 * The getter function "getDateEntry"
	 *
	 * @return string
	 */
	final public function getDateEntry(): string
  {
    return $this->dateEntry;
  }
	
	/**
	 * The getter function "getSalaryBase"
	 *
	 * @return float
	 */
  final public function getSalaryBase(): float
  {
    return $this->salaryBase;
  }
	
	/**
	 * The getter function "getBonus"
	 *
	 * @return float
	 */
  final public function getBonus(): float
  {
    return $this->bonus;
  }
	
	/**
	 * The getter function "getPenalty"
	 *
	 * @return float
	 */
  final public function getPenalty(): float
  {
    return $this->penalty;
  }
	
	/**
	 * The getter function "getSeniorityRate"
	 *
	 * @return float
	 */
  final public function getSeniorityRate(): float
  {
    return $this->seniorityRate;
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
	 * The setter function "setDateEntry"
	 *
	 * @param string $dateEntry
	 * @return $this
	 */
  final public function setDateEntry(string $dateEntry): self
  {
    $this->dateEntry = $dateEntry;
    return $this;
  }
	
	/**
	 * The setter function "setSalaryBase"
	 *
	 * @param float $salaryBase
	 * @return $this
	 */
  final public function setSalaryBase(float $salaryBase): self
  {
    $this->salaryBase = $salaryBase;
    return $this;
  }
	
	/**
	 * The setter function "setBonus"
	 *
	 * @param float $bonus
	 * @return $this
	 */
  final public function setBonus(float $bonus): self
  {
    $this->bonus = $bonus;
    return $this;
  }
	
	/**
	 * The setter function "setPenalty"
	 *
	 * @param float $penalty
	 * @return $this
	 */
  final public function setPenalty(float $penalty): self
  {
    $this->penalty = $penalty;
    return $this;
  }
	
	/**
	 * The setter function "setSeniorityRate"
	 *
	 * @param float $seniorityRate
	 * @return $this
	 */
  final public function setSeniorityRate(float $seniorityRate): self
  {
    $this->seniorityRate = $seniorityRate;
    return $this;
  }
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
	/**
	 * The function "getNetSalary"
	 *
	 * @return float
	 * @throws \Exception
	 */
  final public function getNetSalary(): float
  {
    $coeff = 1 + ($this->getBonus() - $this->getPenalty()) + ($this->getSeniorityRate() * $this->getSeniority());
    return $this->getSalaryBase() * $coeff;
  }
	
	/**
	 * The function "getSeniority"
	 *
	 * @return int
	 * @throws \Exception
	 */
  final public function getSeniority(): int
  {
	  return $this->dateDiffYear($this->getDateEntry());
  }

}