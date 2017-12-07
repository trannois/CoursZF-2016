<?php
namespace UPJV\DbModule\Controller;

use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class ClientController
 * Cette classe gère le CRUD sur les clients
 * Elle a besoin de l'adaptateur
 * @package UPJV\DbModule\Controller
 */
class ClientController extends AbstractActionController
{
    protected $db;

    /**
     * Constructor récupère l'injection de la connexion à la base.
     * @param Adapter $adapter
     */
    public function __construct( Adapter $adapter )
    {
        $this->db = $adapter;
    }

    /**
     * @return ViewModel
     */
    public function createAction()
    {
        $sql = <<<EOT
CREATE TABLE Client
    (
        id INT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    date DATE NOT NULL,
    pass VARCHAR(20) NOT NULL
)
EOT;
        try {
            $res = $this->db->query( $sql, Adapter::QUERY_MODE_EXECUTE );
        } catch ( \PDOException $exception) {
            return $this->pdoException( $exception );
        }
        return $this->defaultQueryResult( $res );
    }

    /**
     * @return ViewModel
     */
    public function dropAction()
    {
        try {
            $res = $this->db->query('DROP TABLE ZF_DB.Client', Adapter::QUERY_MODE_EXECUTE);
        } catch ( \PDOException $exception) {
            return $this->pdoException( $exception );
        }
        return $this->defaultQueryResult( $res );
    }

    /**
     * Associe la vue pdo-exception.phtml à toutes les levés d'exception
     *
     * @param \PDOException $e
     * @return ViewModel
     */
    protected function pdoException( \PDOException $e )
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('error/pdo-exception');
        $viewModel->setVariable('exception', $e);
        return $viewModel;
    }

    protected function defaultQueryResult( $res )
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('upjv/db-module/client/query-result');
        $viewModel->setVariable('result', $res);
        return $viewModel;
    }
}