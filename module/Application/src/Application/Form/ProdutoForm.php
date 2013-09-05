<?php

namespace  Application\Form;


use Zend\Form\form;


use Zend\Form\Element\Hidden;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Text;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Button;
use Zend\Form\Element;
use Zend\Form\Element\File;
use Zend\Form\Element\Submit;

class ProdutoForm extends Form{
	
	
	
	public function  __construct($name=null){
		parent::__construct('produto');
		
		$id = new  Hidden('produto_id');
		
		$nome = new Text("produto_nome");
		$nome->setLabel('Nome:')
		->setAttributes(array(
				'style'=> 'widht:150px'
		)
				
				);
			
		
		 
		 
		 $preco = new Text('produto_preco');
		 $preco->setLabel('Valor do Produto :')
		->setAttributes(array(
				'style'=> 'widht:60px'
		)
				
				);
		 
		 
		 $foto = new File('produto_foto');
		 $foto->setLabel('Foto :')
		 ->setAttributes(array(
		 		'style'=> 'widht:150px'
		 )
		 
		 );
		 
		 
		 $descricao = new Textarea('produto_descricao');
		 $descricao->setLabel('Descrição:')
		->setAttributes(array(
				'style'=> 'widht:150px; heidth:160px'
		)
				
				);
		 	
		 $status = new Checkbox('produto_status');
		 $status->setLabel('Status :')
		 ->setValue(1);
		 
		 $submit = new Button('submit');
		 $submit->setLabel('Cadastrar')
			->setAttributes(array(
					'type'=>'submit'
					
			));
			
			
			// setando campos criados
			
			$this->add($id);
			$this->add($nome);
			$this->add($preco);
			$this->add($foto);
			$this->add($descricao);
			$this->add($status);
			$this->add($submit);
		 	
	} 
	
} 