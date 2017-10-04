<?php
/**
 * Class that operate on table 'aluno_disciplina'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-05-16 20:43
 */
class AlunoDisciplinaMySqlDAO implements AlunoDisciplinaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AlunoDisciplinaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM aluno_disciplina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM aluno_disciplina';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM aluno_disciplina ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param alunoDisciplina primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM aluno_disciplina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AlunoDisciplinaMySql alunoDisciplina
 	 */
	public function insert($alunoDisciplina){
		$sql = 'INSERT INTO aluno_disciplina (id_aluno, cod_disciplina) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($alunoDisciplina->idAluno);
		$sqlQuery->setNumber($alunoDisciplina->codDisciplina);

		$id = $this->executeInsert($sqlQuery);	
		$alunoDisciplina->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AlunoDisciplinaMySql alunoDisciplina
 	 */
	public function update($alunoDisciplina){
		$sql = 'UPDATE aluno_disciplina SET id_aluno = ?, cod_disciplina = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($alunoDisciplina->idAluno);
		$sqlQuery->setNumber($alunoDisciplina->codDisciplina);

		$sqlQuery->setNumber($alunoDisciplina->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM aluno_disciplina';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdAluno($value){
		$sql = 'SELECT * FROM aluno_disciplina WHERE id_aluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodDisciplina($value){
		$sql = 'SELECT * FROM aluno_disciplina WHERE cod_disciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdAluno($value){
		$sql = 'DELETE FROM aluno_disciplina WHERE id_aluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodDisciplina($value){
		$sql = 'DELETE FROM aluno_disciplina WHERE cod_disciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AlunoDisciplinaMySql 
	 */
	protected function readRow($row){
		$alunoDisciplina = new AlunoDisciplina();
		
		$alunoDisciplina->idAluno = $row['id_aluno'];
		$alunoDisciplina->codDisciplina = $row['cod_disciplina'];
		$alunoDisciplina->id = $row['id'];

		return $alunoDisciplina;
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
	 * @return AlunoDisciplinaMySql 
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