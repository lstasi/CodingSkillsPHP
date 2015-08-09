<?php
use DataStructures\HashTables;
use Tests\BaseTestCase;
/**
 *
 * @author lstasi
 *        
 */
class HashTablesTest extends BaseTestCase {
	public function testConstructor() {
		$hashTable = new HashTables ();
		$this->assertInstanceOf ( "DataStructures\HashTables", $hashTable );
	}
	public function preLoaderHashDataProvider($valuesCount) {
		// use the factory to create a Faker\Generator instance
		$faker = Faker\Factory::create ();
		$rtnArray = array ();
		for($i = 0; $i < $valuesCount; $i ++) {
			$rtnArray [] = array (
					$faker->word,
					$faker->randomNumber ( 2 ) 
			);
		}
		return $rtnArray;
	}
	public function preLoader1Value() {
		return $this->preLoaderHashDataProvider ( 1 );
	}
	public function preLoaderMultipleValues() {
		$rtnArray = array (
				array (
						100 
				),
				array (
						200 
				),
				array (
						400 
				) 
		);
		return $rtnArray;
	}
	/**
	 * testSetValue
	 * @dataProvider preLoader1Value
	 */
	public function testSetValue($key, $value) {
		$this->startTest ( __METHOD__ );
		
		$hashTable = new HashTables ();
		
		// $this->assertTrue($hashTable->setValue($key,$value));
		// $this->assertEquals($value,$hashTable->getValue($key));
		
		$this->endTest ();
		$this->printComplexity ();
	}
	/**
	 * testMultiSetValues
	 * @dataProvider preLoaderMultipleValues
	 */
	public function testMultiSetValues($count) {
		$hashTable = new HashTables ();
		$dataProvider = $this->preLoaderArrayDataProvider ( $count );
		
		$this->startTest ( __METHOD__ . "Count: " . $count );
		foreach ( $dataProvider as $data ) {
			$this->assertTrue ( $hashTable->setValue ( $data [0], $data [1] ) );
			// print_r($hashTable);
			$this->assertEquals ( $data [1], $hashTable->getValue ( $data [0] ) );
		}
		$this->endTest ();
		$this->printComplexity ();
	}
}

?>