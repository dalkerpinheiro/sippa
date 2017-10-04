<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-05-30 21:38
 */
interface ExemploDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Exemplo 
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
 	 * @param exemplo primary key
 	 */
	public function delete($cod);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Exemplo exemplo
 	 */
	public function insert($exemplo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Exemplo exemplo
 	 */
	public function update($exemplo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByIdade($value);

	public function queryByCpf($value);


	public function deleteByNome($value);

	public function deleteByIdade($value);

	public function deleteByCpf($value);


}
?>