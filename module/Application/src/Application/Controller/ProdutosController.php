<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\form\ProdutoForm;

class ProdutosController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    
    
    public function novoAction()
    {
    	
    	$form = new ProdutoForm();
    	
    	$request = $this->getRequest();
    	if($request->isPost()){
    		$data= $request->getPost();
    		
    		var_dump($data);
    	}
    	
    	$view = new ViewModel(array(
    		'form'	=>$form
    	));
    	
    	// setando o template diferente da view padrão
    	$view->setTemplate('application\produtos\form.phtml');
    	return $view;
    	
    	return new ViewModel();
    }
}
