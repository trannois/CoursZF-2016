<?php
namespace UPJV\DbModule\Controller;


use UPJV\DbModule\Model\DbModel;
use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * Cette classe gère la structure de la base de donnée
 * Elle a besoin de l'adaptateur
 * @package UPJV\DbModule\Controller
 */
class IndexController extends AbstractActionController
{
    protected $db;

    /**
     * IndexController constructor.
     * @param Adapter $adapter
     */
    public function __construct( Adapter $adapter )
    {
        $this->db = $adapter;
    }

    /**
     * Action par défaut dit simplement si la connexion est ok
     * @return array
     */
    public function indexAction()
    {
        return ['flag'=>( $this->db instanceof Adapter ) ];
    }

    public function initdatabaseAction()
    {
        $model = new DbModel($this->db);
        $model->create();
        $viewModel = new ViewModel();
        $viewModel->setTemplate('upjv/db-module/index/index');
        $viewModel->setVariable('flag', true);
        return $viewModel;
    }
}