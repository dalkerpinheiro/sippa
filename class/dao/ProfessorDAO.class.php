<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-05-16 20:43
 */
interface ProfessorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Professor 
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
 	 * @param professor primary key
 	 */
	public function delete($cod);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Professor professor
 	 */
	public function insert($professor);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Professor professor
 	 */
	public function update($professor);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByUsuario($value);

	public function queryBySenha($value);

	public function queryByEmail($value);


	public function deleteByNome($value);

	public function deleteByUsuario($value);

	public function deleteBySenha($value);

	public function deleteByEmail($value);


}
?>