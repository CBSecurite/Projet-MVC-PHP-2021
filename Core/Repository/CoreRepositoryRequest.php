<?php
namespace Core\Repository;

use Core\CoreBdd;
use PDO;

abstract class CoreRepositoryRequest
{
	
	final public function setDatas(array $datas): self
	{
		foreach ($datas as $key => $value) {
			$method = "set" . str_replace(" ", "", ucfirst(str_replace("-", " ", $key)));
			if(method_exists($this, $method)) { $this->$method($value); }
		}
		return $this;
	}
	
	final public function findAll(array|null $order = null, array|null $limit = null):  array
	{
		$order ? $vuOrder = $order : $vuOrder = ["id" => "desc"];
		$limit ? $vuLimit = $limit : $vuLimit = null;
		return $this->find(null, $vuOrder, $vuLimit);
	}
	
	final public function findOneBy(array $where, array|null $order = null, array|null $limit = null):  array|self|null
	{
		$var = $this->find($where, $order, $limit);
		return count($var) ? $this->setDatas($var[0]) : null;
	}
	
	final public function findById(int $id): array|self|null
	{
		$var = $this->find(["id" => ["=", $id]]);
		return count($var) ? $this->setDatas($var[0]) : null;
	}
	
	final public function findIdCollect(int $id, string $collect): Object
	{
		$newCollect = new $collect();
		$newCollect->findById($id);
		return $newCollect;
	}
	
	final public function find(array|null $where = null, array|null $order = null, array|null $limit = null): ?array
	{
		$var = [];
		$vuWhere = "";
		$vuWhereBind = [];
		$vuOrder = "";
		$vuLimit = "";
		if($where){
			foreach($where as $k => $v){
				$g = 0;
				$vuWhere = " WHERE ";
				if($g > 0){ $vuWhere .= " AND "; }
				$vuWhere .= $k . " " . $v[0] . " ?";
				$vuWhereBind[] = $v[1];
				$g++;
			}
		}
		if($order){
			$h = 0;
			foreach($order as $k => $v){
				if($h === 0){ $vuOrder = " ORDER BY "; }
				if($h > 0){ $vuOrder = ", "; }
				$vuOrder .= $k . " " . $v;
				$h++;
			}
		}
		if($limit){
			$vuLimit = " LIMIT " . $limit[0] . ", " . $limit[1];
		}
		$req = $this->connectPDO()
								->prepare("SELECT * FROM " .
													$this->getTableName() .
													($where ? $vuWhere : "") .
													($order ? $vuOrder : "") .
													($limit ? $vuLimit : "")
								);
		$res = $req->execute($where ? $vuWhereBind : null);
		if($res) {
			while($datas = $req->fetch(PDO::FETCH_ASSOC)){
				array_push($var, $datas);
			}
			$req->closeCursor();
			return $var;
		}
		return null;
	}
	
	final public function update(int $id, object|array $model): bool
	{
		$champs = [];
		$valeurs = [];
		foreach($model as $key => $value) {
			$champs[] = $key . " = ?";
			$valeurs[] = $value;
		}
		$valeurs[] = $id;
		$liste_champs = implode(', ', $champs);
		$req = $this->connectPDO()->prepare("UPDATE " . $this->getTableName() . " SET " . $liste_champs . " WHERE id = ?");
		return $req->execute($valeurs);
	}
	
	final public function delete(int $id): bool
	{
		$req = $this->connectPDO()->prepare("DELETE FROM " . $this->getTableName() . " WHERE id = ?");
		return $req->execute([$id]);
	}
	
	final public function deleteBy(array $where): bool
	{
		$vuWhere = "";
		$vuWhereBind = [];
		$g = 0;
		foreach($where as $k => $v){
			if($g === 0){ $vuWhere = " WHERE "; }
			if($g > 0){ $vuWhere .= " AND "; }
			$vuWhere .= $k . " " . $v[0] . " ?";
			$vuWhereBind[] = $v[1];
			$g++;
		}
		$req = $this->connectPDO()->prepare("DELETE FROM " . $this->getTableName() . $vuWhere);
		return $req->execute($vuWhereBind);
	}
	
	final public function insert(array $array): self
	{
		#  List of variables for PDO
		$tablechamps = "";
		$tableValues = "";
		$champs = [];
		
		# Variables' stocking for PDO
		foreach($array as $key => $value) {
			$tablechamps !== "" ? $separator = ", " : $separator = "";
			$tablechamps .= $separator.$key;
			$tableValues .= $separator . "?";
			array_push($champs, $value);
		}
		
		# Insert
		$query = "INSERT INTO " . $this->getTableName() . " (" . $tablechamps . ") VALUES (" . $tableValues . ")";
		$req = $this->connectPDO();
		$stmt = $req->prepare($query);
		$stmt->execute($champs);
		$this->setTableId($req->lastInsertId());
		
		return $this;
	}

}