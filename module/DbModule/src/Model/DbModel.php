<?php
/**
 * Created by PhpStorm.
 * User: harold
 * Date: 08/12/2016
 * Time: 16:50
 */

namespace UPJV\DbModule\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Ddl;
use Zend\Db\Sql\Sql;

/**
 * Class ModelDb
 * S'occupe de construire la structure de la base de donnée
 * @package UPJV\DbModule\Model
 */
class DbModel
{
    protected $adapter;

    public function __construct( Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function create()
    {
        $table = new Ddl\CreateTable('User');
        $table->addColumn(new Ddl\Column\Integer('id'));
        $table->addColumn(new Ddl\Column\Varchar('name', 255));
        $table->addColumn(new Ddl\Column\Date('dateInscription'));

        $sql = new Sql($this->adapter);

        $this->adapter->query(
            $sql->buildSqlString($table),
            Adapter::QUERY_MODE_EXECUTE
        );
    }

}