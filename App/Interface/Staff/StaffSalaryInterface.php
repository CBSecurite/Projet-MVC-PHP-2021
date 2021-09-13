<?php
namespace App\Interface\Staff;

interface StaffSalaryInterface
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
	 * The getter function "getDateEntry"
	 *
	 * @return string
	 */
	public function getDateEntry(): string;
	
	/**
	 * The getter function "getSalaryBase"
	 *
	 * @return float
	 */
	public function getSalaryBase(): float;
	
	/**
	 * The getter function "getBonus"
	 *
	 * @return float
	 */
	public function getBonus(): float;
	
	/**
	 * The getter function "getPenalty"
	 *
	 * @return float
	 */
	public function getPenalty(): float;
	
	/**
	 * The getter function "getSeniorityRate"
	 *
	 * @return float
	 */
	public function getSeniorityRate(): float;
	
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
	 * The setter function "setDateEntry"
	 *
	 * @param string $dateEntry
	 * @return $this
	 */
	public function setDateEntry(string $dateEntry): self;
	
	/**
	 * The setter function "setSalaryBase"
	 *
	 * @param float $salaryBase
	 * @return $this
	 */
	public function setSalaryBase(float $salaryBase): self;
	
	/**
	 * The setter function "setBonus"
	 *
	 * @param float $bonus
	 * @return $this
	 */
	public function setBonus(float $bonus): self;
	
	/**
	 * The setter function "setPenalty"
	 *
	 * @param float $penalty
	 * @return $this
	 */
	public function setPenalty(float $penalty): self;
	
	/**
	 * The setter function "setSeniorityRate"
	 *
	 * @param float $seniorityRate
	 * @return $this
	 */
	public function setSeniorityRate(float $seniorityRate): self;
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
	/**
	 * The function "getNetSalary"
	 *
	 * @return float
	 */
	public function getNetSalary(): float;
	
}