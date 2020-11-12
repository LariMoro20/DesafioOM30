<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class db_model extends CI_Model {
	public function __construct()	{
		parent::__construct();
		if(isset($_POST)){ array_walk_recursive($_POST, function(&$v, $k) {$v = (utf8_decode($v));}); }
		if(isset($_GET)){ array_walk_recursive($_GET, function(&$v, $k) {$v = mysqli_real_escape_string($this->db->conn_id,utf8_decode($v));}); }
	}

	public function getPacientes($id=false){
		if($id){
			$this->db->where('Id', $id);
		}
        return $this->db->get('pacientes')->result();
	}
	
	public function addPacientes($POST){
		if($POST && !$this->db_model->isDataEmpty($POST)){

			$dataNasc = DateTime::createFromFormat('d/m/Y', $POST['data_nasc']);
			$data = array(
				'nome' => $POST['nome'],
				//'foto' => $POST['foto'],
				'nome_mae' => $POST['nome_mae'],
				'data_nasc' => $dataNasc->format('Y-m-d H:i:s'),
				'CPF' => $POST['CPF'],
				'CNS' => $POST['CNS'],
				'endereco' => $POST['endereco'],
				);

			if($this->db->insert('pacientes', $data)){
				$Id = $this->db->insert_id();
				$retorno['msg']='Adicionado com sucesso!';
				$retorno['status']=true;
				$retorno['id']=$Id;
				return $retorno;
			}
			else{
				$retorno['msg']='Houve algum erro!';
				$retorno['status']=false;
				$retorno['id']=null;
				return $retorno;
			}
		}else{
			$retorno['msg']='Faltam dados para cadastrar!';
			$retorno['status']=false;
			$retorno['id']=null;
			return $retorno;
		}
	}
	
	public function updatePacientes($POST){
		if($POST && !$this->db_model->isDataEmpty($POST)){
			$data = array(
				'nome' => $USER['nome'],
				'foto' => $USER['foto'],
				'nome_mae' => $USER['nome_mae'],
				'data_nasc' => $USER['data_nasc'],
				'CPF' => $USER['CPF'],
				'CNS' => $USER['CNS'],
				'endereco' => $USER['endereco'],
				);
			
			$this->db->where('Id', $USER['Id']);
			if($this->db->update('pacientes', $data)){
				$retorno['msg']='Sucesso!';
				$retorno['status']=true;
				return $retorno;
			}
			else{
				$retorno['msg']='Houve algum erro!';
				$retorno['status']=false;
				return $retorno;
			}
		}else{
			$retorno['msg']='Faltam dados para atualizar!';
			$retorno['status']=false;
			return $retorno;
		}
	}
	public function deletePaciente($id){
		if($id){
			$this->db->where('Id', $id['id']);
        	if($this->db->delete('pacientes')){
				$retorno['msg']='Deletado com sucesso!';
				$retorno['status']=true;
			}else{
				$retorno['msg']='Erro ao deletar!';
				$retorno['status']=false;
			}
			
		}else{
			$retorno['msg']='Paciente não informado!';
			$retorno['status']=false;
		}
		return $retorno;
	}

	public function addArquivo($id, $path){
		$data = array(
			'foto' 	=> $path,
		);
		$this->db->where('Id', $id);
		if($this->db->update('pacientes', $data)){
			$retorno['status'] 	= true;
			$retorno['msg']		= 'Paciente salvo com sucesso!';
		}
		else{
			$retorno['status'] 	= false;
			$retorno['msg']		= 'Erro ao adicionar arquivo ao paciente, mas paciente salvo!';
		}
		return json_encode($retorno);

	}


	public function isDataEmpty($arrayOfData, $safeValues = false){
		foreach ($arrayOfData as $key => $value) {
			if($safeValues){
				if(strlen($value) < 1 && !in_array($key, $safeValues))
					return true;
			}
			else if(strlen($value) < 1)
				return true;
		}
		return false;
	}

}
	
?>