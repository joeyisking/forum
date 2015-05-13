<?php
namespace Application\Model;

// use Zend\Db\ResultSet\ResultSet;
// use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter; 
use Zend\Db\Sql\Sql;
//use Zend\Db\Adapter\Zend\Db\Adapter;
 use Zend\ServiceManager\FactoryInterface;
 use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
class Dev
{

	public function getID()
	{
		$sql = $this->getServiceLocator()->get('db');		
		//$test = new Adapter();
 var_dump($test);die('xxx');
//	$dbAdapter = new AdapterInterface();	
//$db = new DbAdapter(
  //      array(
    //        'driver'        => 'Pdo',
      //      'dsn'            => 'mysql:dbname=blog;host=localhost',
      //      'username'       => 'root',
      //      'password'       => '',
      //      )
  //  );
   //  $sql    = new Sql(dbAdapter);
	
	//$sql = new Sql($this->)
//	$sql    = new Sql($db);
    $select = $sql->select('posts');

    $stmt   = $sql->prepareStatementForSqlObject($select);
    $results = $stmt->execute();

	$returnArray = array();
	// iterate through the rows
	foreach ($results as $result) {
    	$returnArray[] = $result;
	}

		echo '<pre>'; var_dump($returnArray);die('xxx');
         return $result;

		return 'got an id';
	}
}

