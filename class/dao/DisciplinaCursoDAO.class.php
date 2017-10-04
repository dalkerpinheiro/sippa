<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-05-31 14:38
 */
interface DisciplinaCursoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DisciplinaCurso 
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
 	 * @param disciplinaCurso primary key
 	 */
	public function delete($cod);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DisciplinaCurso disciplinaCurso
 	 */
	public function insert($disciplinaCurso);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DisciplinaCurso disciplinaCurso
 	 */
	public function update($disciplinaCurso);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByAno($value);

	public function queryBySemestre($value);

	public function queryByCodCurso($value);

	public function queryByCodDisciplina($value);


	public function deleteByAno($value);

	public function deleteBySemestre($value);

	public function deleteByCodCurso($value);

	public function deleteByCodDisciplina($value);


}
?>