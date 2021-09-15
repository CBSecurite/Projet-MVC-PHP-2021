<?php
namespace Core\Repository;

use PDO;

abstract class CoreRepositoryRequest
{
	/**
	 * The function "setDatas"
	 *
	 * @param array $datas
	 * @return $this
	 */
	final public function setDatas(array $datas): self
	{
		foreach ($datas as $key => $value) {
			$method = "set" . str_replace(" ", "", ucfirst(str_replace("-", " ", $key)));
			if(method_exists($this, $method)) { $this->$method($value); }
		}
		return $this;
	}
	
	/**
	 * The function "findAll"
	 *
	 * @param array|null $order
	 * @param array|null $limit
	 * @return array|null
	 */
	final public function findAll(array|null $order = null, array|null $limit = null):  ?array
	{
		$order ? $vuOrder = $order : $vuOrder = ["id" => "desc"];
		$limit ? $vuLimit = $limit : $vuLimit = null;
		return $this->find(null , $vuOrder, $vuLimit);
	}
	
	/**
	 * The function "findOneBy"
	 *
	 * @param array $where
	 * @param array|null $order
	 * @param array|null $limit
	 * @return array|$this|null
	 */
	final public function findOneBy(array $where, array|null $order = null, array|null $limit = null): array|self|null
	{
		$var = $this->find($where, $order, $limit);
		(count($var) ? $this->setDatas($var[0]) : null);
		return $var;
	}
	
	/**
	 * The function "findById"
	 *
	 * @param int $id
	 * @return array|$this|null
	 */
	final public function findById(int $id): array|self|null
	{
		$var = $this->find(["id" => ["=", $id]]);
		(count($var) ? $this->setDatas($var[0]) : null);
		return $var;
	}
	
	/**
	 * The function "findIdCollect"
	 *
	 * @param int $id
	 * @param string $collect
	 * @return Object
	 */
	final public function findIdCollect(int $id, string $collect): Object
	{
		$newCollect = new $collect();
		$newCollect->findById($id);
		return $newCollect;
	}
	
	/**
	 * The function "find"
	 *
	 * @param array|null $where
	 * @param array|null $order
	 * @param array|null $limit
	 * @return array|null
	 */
	final public function find(array|null $where = null, array|null $order = null, array|null $limit = null): ?array
	{
		$var = [];
		$vuWhere = "";
		$vuWhereBind = [];
		$vuOrder = "";
		$vuLimit = "";
		if($where){
			$g = 0;
			$vuWhere = " WHERE ";
			foreach($where as $k => $v){
				if($g > 0){ $vuWhere .= " AND "; }
				$vuWhere .= $k . " " . $v[0] . " ?";
				$vuWhereBind[] = $v[1];
				$g++;
			}
		}
		if($order){
			$h = 0;
			$vuOrder = " ORDER BY ";
			foreach($order as $k => $v){
				if($h > 0){ $vuOrder .= ", "; }
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
		
		if($req->execute(count($vuWhereBind) ? $vuWhereBind : null)) {
			while($datas = $req->fetch(PDO::FETCH_ASSOC)){
				array_push($var, $datas);
			}
			$req->closeCursor();
			return $var;
		}
		
		return null;
	}
	
	/**
	 * The function "update"
	 *
	 * @param int $id
	 * @param object|array $model
	 * @return bool
	 */
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
	
	/**
	 * The function "delete"
	 *
	 * @param int $id
	 * @return bool
	 */
	final public function delete(int $id): bool
	{
		$req = $this->connectPDO()->prepare("DELETE FROM " . $this->getTableName() . " WHERE id = ?");
		return $req->execute([$id]);
	}
	
	/**
	 * The function "deleteBy"
	 *
	 * @param array $where
	 * @return bool
	 */
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
	
	/**
	 * The function "insert"
	 *
	 * @param array $array
	 * @return $this
	 */
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