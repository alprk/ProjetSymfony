<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 19/07/2018
 * Time: 14:34
 */

namespace App\Tests\Entity;


use App\Entity\Atom;
use App\Entity\Molecule;
use PHPUnit\Framework\TestCase;






class MoleculeTest extends TestCase
{
    public function testMoleculeCanBeInstancied()
    {
        $this->assertInstanceOf(Molecule::class,new Molecule('glucide'));
    }
    public function testAtomCanBeAddedInMolecule()
    {
        $atome = $this->createMock(Atom::class);
        $molecule = new Molecule('glucide');
        $molecule->addAtom($atome);

        $this->assertSame($molecule,$molecule->addAtom($atome));

        $this->assertContainsOnlyInstancesOf(Atom::class,$molecule->getAtoms());

    }

    public function testMoleculeCannotContainOnlyOneAtom()
    {
        $this->expectException(\LogicException::class);

        $atom = $this->getMockBuilder(Atom::class)
                    ->disableOriginalConstructor()
                    ->setMethods(['getSymbol'])
                    ->getMock();

        $atom->method('getSymbol')->willReturn('C');

        $molecule = new Molecule('glucide');
        $molecule->addAtom($atom);
        $molecule->getName();


    }

    public function testMoleculeCanBeMerged()
    {
        $carbone = $this->createConfiguredMock(Atom::class,[
            'getSymbol' => 'C'
        ]);

        $oxygene = $this->createConfiguredMock(Atom::class,[
            'getSymbol' => 'O'
        ]);

        $molecule = new Molecule('glucide');
        $molecule->addAtom($carbone);
        $molecule->addAtom($oxygene);



        $this->assertEquals('CO',$molecule->getName());



    }

    public function testCanRetrievedMoleculeType()
    {
        $molecule = new Molecule('glucide');

        $this->assertEquals('glucide',$molecule->getMoleculeType());

    }


}