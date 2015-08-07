Feature: Basic Needs

    Scenario: Feeding Tamagotchi
        As a Tamagotchi owner
        I want to feed my Tamagotchi
        So that I can satiate it's hunger
        Given I have a Tamagotchi
        When I feed it
        Then it's hungriness is decreased
        And it's fullness is increased
        
    Scenario: Playing With Tamagotchi
        As a Tamagotchi owner
        I want to play with my Tamagotchi
        So that I can make it happier
        Given I have a Tamagotchi
        When I play with it
        Then it's happiness is increased
        And it's tiredness is increased
        
    Scenario: Putting Tamagotchi to Bed
        As a Tamagotchi owner
        I want to put my Tamagotchi to bed
        So that I can refill it's energy
        Given I have a Tamagotchi
        When I put it to bed
        Then it's tiredness is decreased
        
    Scenario: Making Tamagotchi Poop
        As a Tamagotchi owner
        I want to make my Tamagotchi poop
        So that it is more comfortable
        Given I have a Tamagotchi
        When I make it poop
        Then it's fullness is decreased
        
    Scenario: Changing Tamagotchi Needs Over Time
        As a Tamagotchi owner
        I want my Tamagotchi's needs to change over time
        So that I have to look after it carefully
        Given I have a Tamagotchi
        When time passes
        Then it's tiredness is increased
        And it's hungriness is increased
        And it's happiness is decreased