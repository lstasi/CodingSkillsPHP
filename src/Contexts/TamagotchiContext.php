<?php
namespace Contexts;

use Behat\Behat\Context\BehatContext;
use Behat\Behat\Exception\PendingException;
use Excercises\Tamagotchi;
use Tests\BaseTestCase;

class TamagotchiContext extends BehatContext
{
    private $tamagotchi;
    
    public function __construct(array $parameters=array())
    {
        // do subcontext initialization
    }

    /**
     * @Given I have a Tamagotchi
     */
    public function iHaveATamagotchi()
    {
        $this->tamagotchi = new Tamagotchi();
        \PHPUnit_Framework_Assert::assertInstanceOf("Excercises\Tamagotchi", $this->tamagotchi);
    }
    
    /**
     * @When I feed it
     */
    public function iFeedIt()
    {
        throw new PendingException();
    }
    
    /**
     * @Then it's hungriness is decreased
     */
    public function itSHungrinessIsDecreased()
    {
        throw new PendingException();
    }
    
    /**
     * @Then it's fullness is increased
     */
    public function itSFullnessIsIncreased()
    {
        throw new PendingException();
    }
    
    /**
     * @When I play with it
     */
    public function iPlayWithIt()
    {
        throw new PendingException();
    }
    
    /**
     * @Then it's happiness is increased
     */
    public function itSHappinessIsIncreased()
    {
        throw new PendingException();
    }
    
    /**
     * @Then it's tiredness is increased
     */
    public function itSTirednessIsIncreased()
    {
        throw new PendingException();
    }
    
    /**
     * @When I put it to bed
     */
    public function iPutItToBed()
    {
        throw new PendingException();
    }
    
    /**
     * @Then it's tiredness is decreased
     */
    public function itSTirednessIsDecreased()
    {
        throw new PendingException();
    }
    
    /**
     * @When I make it poop
     */
    public function iMakeItPoop()
    {
        throw new PendingException();
    }
    
    /**
     * @Then it's fullness is decreased
     */
    public function itSFullnessIsDecreased()
    {
        throw new PendingException();
    }
    
    /**
     * @When time passes
     */
    public function timePasses()
    {
        throw new PendingException();
    }
    
    /**
     * @Then it's hungriness is increased
     */
    public function itSHungrinessIsIncreased()
    {
        throw new PendingException();
    }
    
    /**
     * @Then it's happiness is decreased
     */
    public function itSHappinessIsDecreased()
    {
        throw new PendingException();
    }
}