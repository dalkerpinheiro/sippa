<?php
/**
 * Class that operate on table 'disciplina_curso'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-05-31 14:38
 */
class DisciplinaCursoMySqlDAO implements DisciplinaCursoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DisciplinaCursoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM disciplina_curso WHERE cod = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM disciplina_curso';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM disciplina_curso ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param disciplinaCurso primary key
 	 */
	public function delete($cod){
		$sql = 'DELETE FROM disciplina_curso WHERE cod = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($cod);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DisciplinaCursoMySql disciplinaCurso
 	 */
	public function insert($disciplinaCurso){
		$sql = 'INSERT INTO disciplina_curso (ano, semestre, cod_curso, cod_disciplina) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($disciplinaCurso->ano);
		$sqlQuery->set($disciplinaCurso->semestre);
		$sqlQuery->setNumber($disciplinaCurso->codCurso);
		$sqlQuery->setNumber($disciplinaCurso->codDisciplina);

		$id = $this->executeInsert($sqlQuery);	
		$disciplinaCurso->cod = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DisciplinaCursoMySql disciplinaCurso
 	 */
	public function update($disciplinaCurso){
		$sql = 'UPDATE disciplina_curso SET ano = ?, semestre = ?, cod_curso = ?, cod_disciplina = ? WHERE cod = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($disciplinaCurso->ano);
		$sqlQuery->set($disciplinaCurso->semestre);
		$sqlQuery->setNumber($disciplinaCurso->codCurso);
		$sqlQuery->setNumber($disciplinaCurso->codDisciplina);

		$sqlQuery->setNumber($disciplinaCurso->cod);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM disciplina_curso';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAno($value){
		$sql = 'SELECT * FROM disciplina_curso WHERE ano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySemestre($value){
		$sql = 'SELECT * FROM disciplina_curso WHERE semestre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodCurso($value){
		$sql = 'SELECT * FROM disciplina_curso WHERE cod_curso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodDisciplina($value){
		$sql = 'SELECT * FROM disciplina_curso WHERE cod_disciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAno($value){
		$sql = 'DELETE FROM disciplina_curso WHERE ano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySemestre($value){
		$sql = 'DELETE FROM disciplina_curso WHERE semestre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodCurso($value){
		$sql = 'DELETE FROM disciplina_curso WHERE cod_curso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodDisciplina($value){
		$sql = 'DELETE FROM disciplina_curso WHERE cod_disciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DisciplinaCursoMySql 
	 */
	protected function readRow($row){
		$disciplinaCurso = new DisciplinaCurso();
		
		$disciplinaCurso->cod = $row['cod'];
		$disciplinaCurso->ano = $row['ano'];
		$disciplinaCurso->semestre = $row['semestre'];
		$disciplinaCurso->codCurso = $row['cod_curso'];
		$disciplinaCurso->codDisciplina = $row['cod_disciplina'];

		return $disciplinaCurso;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return DisciplinaCursoMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>