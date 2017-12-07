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
    const TABLE_NAME_CLIENT = 'Client';

    protected $adapter;

    public function __construct( Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Création de la table Client avec les
     * @return \Zend\Db\Adapter\Driver\StatementInterface|\Zend\Db\ResultSet\ResultSet
     */
    public function createTableClient()
    {
        $table = new Ddl\CreateTable(self::TABLE_NAME_CLIENT);
        $table->addColumn(new Ddl\Column\Integer('id'));
        $table->addColumn(new Ddl\Column\Varchar('name', 30));
        $table->addColumn(new Ddl\Column\Date('date'));
        $table->addColumn(new Ddl\Column\Varchar('pass', 20));
        $table->addConstraint(new Ddl\Constraint\PrimaryKey('id'));

        $sql = new Sql($this->adapter);

        return $this->adapter->query(
            $sql->buildSqlString($table),
            Adapter::QUERY_MODE_EXECUTE
        );
    }

    public function removeTableClient()
    {
        $sql = new Sql($this->adapter);

        return $this->adapter->query(
            $sql->buildSqlString(new Ddl\DropTable(self::TABLE_NAME_CLIENT)),
            Adapter::QUERY_MODE_EXECUTE
        );
    }

}