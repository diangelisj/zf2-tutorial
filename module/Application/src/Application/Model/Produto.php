<?php
namespace  Application\Module;



//
use Zend\InputFilter\Factory as InputFactory;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\Code\Reflection\DocBlock\Tag\ReturnTag;
use Zend\InputFilter\InputFilterInterface;
use Zend\Form\Annotation\InputFilter;


class Produto implements InputFilterAwareInterface{

	public $produto_id;
	public $produto_nome;
	public $produto_preco;
	public $produto_foto;
	public $produto_descricao;
	public $produto_status;

	protected  $inputFilter;

	public  function  exchangeArray($data){


		$this->produto_id=(isset($data['produto_id']))? $data['produto_id']:null;
		$this->produto_nome =(isset($data['produto_nome']))? $data['produto_nome']:null;
		$this->produto_preco =(isset($data['produto_preco']))? $data['produto_preco']:null;
		$this->produto_foto =(isset($data['produto_foto']))? $data['produto_foto']:null;
		$this->produto_descricao =(isset($data['produto_descricao']))? $data['produto_descricao']:null;
		$this->produto_status =(isset($data['produto_status']))? $data['produto_status']:null;

	}

	public function getArrayCopy(){
		return  get_object_vars($this);
	}

	public function setInputFilter(InputFilterInterface $inputFilter){

		throw  new  \Exception("Not used yet");

	}

	public function  getInputFilter(){

		if(!$this->inputFilter){
			$inputFilter = new InputFilter();
			$factory= new InputFactory();
				
			$inputFilter->add($factory->createInput(array(
						
					'name'=>'produto_id',
					'requerid'=>true,
					'filter'=>array(
							'name'=>'int'
					)
						
			)));
				
			$inputFilter->add($factory->createInput(Array(
					'name'=>'produto_nome',
					'required'=>true,
					'filter'=>array(
							array('name'=>'StringTags'),
							array('name'=>'StringTrim')
					),
						
					'validators'=>array(
							array(
									'name'=>'NotEmpty',
									'options'=>array(
											'messagens'=>array(
													'isEmpty'=>'Preencha corretamente o campo nome :)'
											)
									)
							)
					)
						
			)));
				

			$inputFilter->add($factory->createInput(Array(
					'name'=>'produto_preco',
					'required'=>true,
					'filter'=>array(
							array('name'=>'StringTags'),
							array('name'=>'StringTrim')
					),

						

			)));
				

			$inputFilter->add($factory->createInput(Array(
					'name'=>'produto_foto',
					'required'=>true,
					'filter'=>array(
							array('name'=>'StringTags'),
							array('name'=>'StringTrim')
					),

					'validators'=>array(
							array(
									'name'=>'NotEmpty',
									'options'=>array(
											'messagens'=>array(
													'isEmpty'=>'Preencha corretamente o campo nome :)'
											)
									)
							)
					)

			)));



			$inputFilter->add($factory->createInput(Array(
					'name'=>'produto_descricao',
					'required'=>true,
					'filter'=>array(
							array('name'=>'StringTags'),
							array('name'=>'StringTrim')
					),
						
					'validators'=>array(
							array(
									'name'=>'NotEmpty',
									'options'=>array(
											'messagens'=>array(
													'isEmpty'=>'Preencha corretamente o campo nome :)'
											)
									)
							), array(
										
									'name'=>'StringLength',
									true,
									'options' =>array(
											'ecoding'=>'UTF-8',
											'min'=>10,
											'max'=>1000,
											'message'=>'A descrição do produto deve ter entre 10 e 1000 caracteres'
									)
							)
					)
						
			)));
				

			$inputFilter->add($factory->createInput(Array(
					'name'=>'produto_status',
					'required'=>true,
					'filter'=>array(
							array('name'=>'StringTags'),
							array('name'=>'StringTrim')
					),
						

						
			)));

				$this->inputFilter =$inputFilter;
				
		}
		return  $this->inputFilter;
	}
}