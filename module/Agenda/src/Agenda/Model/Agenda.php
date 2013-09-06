<?php
namespace Agenda\Model;

// Add these import statements
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Agenda implements InputFilterAwareInterface
{
    public $agenda_id;
    public $agenda_nome;
    public $agenda_fixo;
    public $agenda_celular;
    public $agenda_email;
    protected $inputFilter;                       // <-- Add this variable

    public function exchangeArray($data)
    {
        $this->agenda_id     = (isset($data['agenda_id']))     ? $data['agenda_id']     : null;
        $this->agenda_nome = (isset($data['agenda_nome'])) ? $data['agenda_nome'] : null;
        $this->agenda_fixo  = (isset($data['agenda_fixo']))  ? $data['agenda_fixo']  : null;
        $this->agenda_celular  = (isset($data['agenda_celular']))  ? $data['agenda_celular']  : null;
        $this->agenda_email  = (isset($data['agenda_email']))  ? $data['agenda_email']  : null;
    }
    
    // Add the following method:
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
    

    // Add content to these methods:
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add(array(
                'name'     => 'agenda_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'agenda_nome',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'agenda_fixo',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 15,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
            	'name'     => 'agenda_celular',
            	'required' => true,
            	'filters'  => array(
            		array('name' => 'StripTags'),
            		array('name' => 'StringTrim'),
            	),
            	'validators' => array(
            		array(
            			'name'    => 'StringLength',
            			'options' => array(
            				'encoding' => 'UTF-8',
            				'min'      => 1,
            				'max'      => 15,
            			),
            		),
            	),
            ));
            
            $inputFilter->add(array(
            	'name'     => 'agenda_email',
            	'required' => true,
            	'filters'  => array(
            		array('name' => 'StripTags'),
            		array('name' => 'StringTrim'),
            	),
            	'validators' => array(
            		array(
            			'name'    => 'StringLength',
            			'options' => array(
            				'encoding' => 'UTF-8',
            				'min'      => 1,
            				'max'      => 200,
            			),
            		),
            	),
            ));
            
            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}