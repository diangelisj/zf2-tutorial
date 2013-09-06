<?php
namespace Agenda\Form;

use Zend\Form\Form;

class AgendaForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('agenda');

        $this->add(array(
            'name' => 'agenda_id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'agenda_nome',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nome',
            ),
        ));
        $this->add(array(
            'name' => 'agenda_fixo',
            'type' => 'Text',
            'options' => array(
                'label' => 'Telefone Fixo',
            ),
        ));
        $this->add(array(
        	'name' => 'agenda_celular',
        	'type' => 'Text',
        	'options' => array(
        		'label' => 'Telefone Celular',
        	),
        ));
        $this->add(array(
        	'name' => 'agenda_email',
        	'type' => 'Text',
        	'options' => array(
        		'label' => 'e-Mail',
        	),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Ir',
                'id' => 'submitbutton',
            ),
        ));
    }
}