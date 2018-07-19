<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 19/07/2018
 * Time: 14:41
 */

namespace App\Entity;


class Molecule
{
    private $molecule_type;
    private $atoms = [];
    private $name;
    /**
     * Molecule constructor.
     * @param $molecule_type
     */
    public function __construct($molecule_type)
    {
        $this->molecule_type = $molecule_type;
    }

    public function addAtom(Atom $atome)
    {
        $this->atoms[] = $atome;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMoleculeType()
    {
        return $this->molecule_type;
    }

    /**
     * @param mixed $molecule_type
     */
    public function setMoleculeType($molecule_type): void
    {
        $this->molecule_type = $molecule_type;
    }

    public function getAtoms()
    {
        return $this->atoms;
    }

    public function merge()
    {
        if (count($this->atoms) <2 )
        {
            throw new \LogicException('il ny a pas assez d atomes');
        }


        $this->name = '';
        foreach ($this->atoms as $atom)
        {
            $this->name .= $atom->getSymbol();
        }
    }

    public function getName()
    {
        if (null == $this->name)
        {
            $this->merge();
        }

        return $this->name;

    }




}