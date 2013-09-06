<?php
namespace Agenda\Model;

use Zend\Db\TableGateway\TableGateway;

class AgendaTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getAgenda($agenda_id)
    {
        $agenda_id  = (int) $agenda_id;
        $rowset = $this->tableGateway->select(array('agenda_id' => $agenda_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $agenda_id");
        }
        return $row;
    }

    public function saveAgenda(Agenda $agenda)
    {
        $data = array(
            'agenda_nome' => $agenda->agenda_nome,
            'agenda_fixo'  => $agenda->agenda_fixo,
        	'agenda_celular'  => $agenda->agenda_celular,
        	'agenda_email'  => $agenda->agenda_email,
        );

        $agenda_id = (int)$agenda->agenda_id;
        if ($agenda_id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAgenda($agenda_id)) {
                $this->tableGateway->update($data, array('agenda_id' => $agenda_id));
            } else {
                throw new \Exception('Album id does not exist');
            }
        }
    }

    public function deleteAgenda($agenda_id)
    {
        $this->tableGateway->delete(array('agenda_id' => $agenda_id));
    }
}