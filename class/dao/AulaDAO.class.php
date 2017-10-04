<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-05-16 20:43
 */
interface AulaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Aula 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param aula primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Aula aula
 	 */
	public function insert($aula);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Aula aula
 	 */
	public function update($aula);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescricao($value);

	public function queryByData($value);

	public function queryByCodDisciplina($value);


	public function deleteByDescricao($value);

	public function deleteByData($value);

	public function deleteByCodDisciplina($value);


}
?>