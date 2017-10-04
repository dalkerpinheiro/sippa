<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-05-16 20:43
 */
interface AlunoDisciplinaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AlunoDisciplina 
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
 	 * @param alunoDisciplina primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AlunoDisciplina alunoDisciplina
 	 */
	public function insert($alunoDisciplina);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AlunoDisciplina alunoDisciplina
 	 */
	public function update($alunoDisciplina);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdAluno($value);

	public function queryByCodDisciplina($value);


	public function deleteByIdAluno($value);

	public function deleteByCodDisciplina($value);


}
?>