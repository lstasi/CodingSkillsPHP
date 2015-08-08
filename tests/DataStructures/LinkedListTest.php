<?php
use Tests\BaseTestCase;
use DataStructures\LinkedList;
class LinkedListTest extends BaseTestCase {
	
	/**
	 *
	 * @param unknown $value        	
	 */
	public function testAddValue() {
		$faker = Faker\Factory::create ();
		$linkedList = new LinkedList ();
		$linkedList->addValue ( $faker->randomNumber ( 2 ) );
	}
	/**
	 * 
	 */
	public function testSearchValue() {
		$faker = Faker\Factory::create ();
		$linkedList = new LinkedList ();
		$randomNumber = $faker->randomNumber ( 2 );
		$this->assertTrue ( $linkedList->addValue ( $randomNumber ) );
		$node = $linkedList->searchValue ( $randomNumber );
		$this->assertNotFalse ( $node );
		$this->assertEquals ( $randomNumber, $node->getValue () );
	}
	public function preLoaderArrayDataProvider($valuesCount) {
		// use the factory to create a Faker\Generator instance
		$faker = Faker\Factory::create ();
		$rtnArray = array ();
		for($i = 0; $i < $valuesCount; $i ++) {
			$rtnArray [] = array (
					$faker->randomNumber ( 2 ) 
			);
		}
		return $rtnArray;
	}
	public function data10Array() {
		return $this->preLoaderArrayDataProvider ( 10 );
	}
	public function preLoaderMultipleValues() {
		$rtnArray = array (
				array (
						100 
				),
				array (
						1000 
				),
				array (
						5000 
				) 
		);
		return $rtnArray;
	}
	/**
	 * @dataProvider preLoaderMultipleValues
	 *
	 * @param int $value        	
	 */
	public function testAddValues($count) {
		$linkedList = new LinkedList ();
		
		$values = $this->preLoaderArrayDataProvider ( $count );
		$this->startTest ( __METHOD__ . "Count: " . $count );
		foreach ( $values as $value ) {
			$this->assertTrue ( $linkedList->addValue ( $value ) );
		}
		$this->endTest ();
		$this->printComplexity ();
	}
	/**
	 * 
	 * @dataProvider preLoaderMultipleValues
	 *
	 * @param int $value        	
	 */
	public function testSearchValues($count) {
		$linkedList = new LinkedList ();
		$values = $this->preLoaderArrayDataProvider ( $count );
		
		foreach ( $values as $value ) {
			$this->assertTrue ( $linkedList->addValue ( $value ) );
		}
		$this->startTest ( __METHOD__ . "Count: " . $count );
		foreach ( $values as $value ) {
			$node = $linkedList->searchValue ( $value );
			$this->assertNotFalse ( $node );
			$this->assertEquals ( $value, $node->getValue () );
		}
		$this->endTest ();
		$this->printComplexity ();
	}
}