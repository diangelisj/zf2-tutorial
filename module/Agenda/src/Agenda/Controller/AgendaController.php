<?php
namespace Agenda\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Agenda\Model\Agenda;          // <-- Add this import
use Agenda\Form\AgendaForm;       // <-- Add this import

class AgendaController extends AbstractActionController
{
	protected $agendaTable;
	
	
   public function indexAction()
    {
        return new ViewModel(array(
            'agenda' => $this->getAgendaTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
        $form = new AgendaForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $agenda = new Agenda();
            $form->setInputFilter($agenda->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $agenda->exchangeArray($form->getData());
                $this->getAgendaTable()->saveAgenda($agenda);

                // Redirect to list of albums
                return $this->redirect()->toRoute('agenda');
            }
        }
        return array('form' => $form);
    }

 // Add content to this method:
    public function editAction()
    {
        $agenda_id = (int) $this->params()->fromRoute('agenda_id', 0);
        if (!$agenda_id) {
            return $this->redirect()->toRoute('agenda', array(
                'action' => 'add'
            ));
        }

        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $genda = $this->getAgendaTable()->getAgenda($agenda_id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('agenda', array(
                'action' => 'index'
            ));
        }

        $form  = new AgendaForm();
        $form->bind($agenda);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($agenda->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getAgendaTable()->saveAgenda($agenda);

                // Redirect to list of albums
                return $this->redirect()->toRoute('agenda');
            }
        }

        return array(
            'agenda_id' => $agenda_id,
            'form' => $form,
        );
    }

   
    // module/Album/src/Album/Controller/AlbumController.php:
    public function getAgendaTable()
    {
    	if (!$this->agendaTable) {
    		$sm = $this->getServiceLocator();
    		$this->agendaTable = $sm->get('Agenda\Model\AgendaTable');
    	}
    	return $this->agendaTable;
    }
    
    
    // Add content to the following method:
    public function deleteAction()
    {
    	
    	
    	$agenda_id = (int) $this->params()->fromRoute('agenda_id', 0);
    	if (!$agenda_id) {
    		return $this->redirect()->toRoute('agenda');
    	}
    
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$del = $request->getPost('del', 'No');
    
    		if ($del == 'Yes') {
    			$agenda_id = (int) $request->getPost('agenda_id');
    			$this->getAlbumTable()->deleteAgenda($agenda_id);
    			
    		}
    
    		// Redirect to list of albums
    	}
    
    	return array(
    			'agenda_id'    => $agenda_id,
    			'agenda' => $this->getAgendaTable()->getAgenda($agenda_id)
    	);
    }
}