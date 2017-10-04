<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return AlunoDAO
	 */
	public static function getAlunoDAO(){
		return new AlunoMySqlExtDAO();
	}

	/**
	 * @return AlunoDisciplinaDAO
	 */
	public static function getAlunoDisciplinaDAO(){
		return new AlunoDisciplinaMySqlExtDAO();
	}

	/**
	 * @return AulaDAO
	 */
	public static function getAulaDAO(){
		return new AulaMySqlExtDAO();
	}

	/**
	 * @return CursoDAO
	 */
	public static function getCursoDAO(){
		return new CursoMySqlExtDAO();
	}

	/**
	 * @return DisciplinaDAO
	 */
	public static function getDisciplinaDAO(){
		return new DisciplinaMySqlExtDAO();
	}

	/**
	 * @return ProfessorDAO
	 */
	public static function getProfessorDAO(){
		return new ProfessorMySqlExtDAO();
	}


}
?>