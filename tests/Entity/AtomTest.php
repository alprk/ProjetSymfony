<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 19/07/2018
 * Time: 12:30
 */

namespace App\Tests\Entity;


use App\Entity\Atom;
use PHPUnit\Framework\TestCase;


/**
 * $atom = new Atom('Carbone','C'); // le symbole doit faire au maximum 2 caractères
 * $atom->getName(); // doit retourner le nom de l'atome
 * $atom->getSymbol(); // doit retourner le symbole
 */


class AtomTest extends TestCase

{
    public function testAtomCanBeCreated()
    {
        $atom = new Atom('test','T');
        $this->assertInstanceOf(Atom::class,$atom);
    }

    public function testAtomHasName()
    {
        $atom = new Atom('Carbone','C');
        $this->assertEquals('Carbone',$atom->getName());
        $this->assertEquals('C',$atom->getSymbol());


        $atom2 = new Atom('Oxygène','O');
        $this->assertEquals('Oxygène',$atom2->getName());
        $this->assertEquals('O',$atom2->getSymbol());
    }

    public function testAtomHasSymbol()
    {
        $atom2 = new Atom('Oxygène','O');
        $this->assertEquals('O',$atom2->getSymbol());

        $atom = new Atom('Carbone','C');
        $this->assertEquals('C',$atom->getSymbol());
    }

    public function testAtomHasMax2CharacterSymbol()
    {
        $this->expectException(\LengthException::class);
        $atom2 = new Atom('Oxygène','Ooo');


    }
    public function testAtomCannotBeCreatedWithoutNameAndSymbol()
    {
        $this->expectException(\ArgumentCountError::class);
        $atom = new Atom();


    }

}