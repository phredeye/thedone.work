<?php


namespace App\Contracts;


interface SeedsFakeData
{
    /**
     * Use factories to generate fake dummy content for ui or other development purposes
     */
    public function generateFakeData() : void;
}
