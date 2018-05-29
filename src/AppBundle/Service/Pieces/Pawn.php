<?php
namespace AppBundle\Service\Pieces;

use AppBundle\Service\Board\BoardCoordinates;
use AppBundle\Service\Movements\Notation;

/**
 * @name Pawn
 *
 * @desc Représente un pion sur un plateau d'échecs
 *
 * @author Luca Mayer-Dalverny & Antoine Berenguer
 */

class Pawn extends Piece
{
    private $hasMoved;
    
    private $enPassantCapturePossble;
    
    /**
     * @return boolean
     */
    public function hasMoved()
    {
        return $this->hasMoved;
    }
    
    public function toString(): String
    {
        return Notation::PAWN . $this->coordinates->toString();
    }
    
    public function __construct(BoardCoordinates $coordinates, bool $isWhite)
    {
        $this->coordinates = $coordinates;
        $this->isWhite = $isWhite;
        $this->value = PiecesValue::PAWN;
        $this->hasMoved = false;
        $this->enPassantCapturePossble = false;
    }
    
    public function moveTo(BoardCoordinates $newCoordinates): bool
    {
        if($newCoordinates->isOnTheBoard())
        {
            $this->coordinates = $newCoordinates;
            if(!$this->hasMoved)
                $this->hasMoved = true;
            if(abs($newCoordinates->getRank()-$this->getCoordinates()->getRank()) == 2)
                $this->enPassantCapturePossble = true;
                else $this->enPassantCapturePossble = false;
            return true;
        }
        return false;
    }
    
}

