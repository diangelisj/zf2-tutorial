<?php
namespace  Application\Module;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Form\Annotation\Object;
use Zend\Stdlib\Hydrator\ObjectProperty;
use Zend\Console\Prompt\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class ProdutoTable extends AbstractTableGateway{
	
	
	
	protected $table ='tbl_produtos';
	
	
	public function  __construct(Adapter $adapter){
		
		$this->adapter=$adapter;
		$this->resultSetPrototype = new ResultSet();
		$this->resultSetPrototype->setArray(ObjectProperty(new Produto()));
		$this->initialize();
		
	}
	public function fechAll($pageNumber =1, $countPerPage =2){
		$select = new Select();
		$select ->from ($this->table)->order('produto_nome');

		$adapter = new DbSelect($select, $this->adapter,$this->resultSetPrototype);
		$paginator = new Paginator($adapter);

		$paginator->setCurrentPageNumber($pageNumber);
		$paginator->setItemCountPerPage($coutPerPage);
		
		return $paginator;
	}
	
	
	public function getProduto($idProduto){
		$idProduto =(int) $idProduto;
		$rowSet  = $this->select(array('produto_id'=>$idProduto));
		$row =  $rowSet->current();
		
		if(!$row){
			
			throw new \Exception ("Registro $idProduto não encontrado");
			return  $row;
		}
		
		
		
	}
	
	public function saveProduto(){
		
	}
}