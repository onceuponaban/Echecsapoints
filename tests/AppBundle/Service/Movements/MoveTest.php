<?php
namespace tests\AppBundle\Service\Movements;

use AppBundle\Service\Pieces\Queen;
use AppBundle\Service\Board\BoardCoordinates;
use AppBundle\Service\Movements\Move;
use AppBundle\Service\Pieces\Pawn;
use AppBundle\Service\Pieces\Knight;
use AppBundle\Service\Pieces\Bishop;
use AppBundle\Service\Pieces\Rook;
use AppBundle\Service\Pieces\King;

class MoveTest extends \PHPUnit_Framework_TestCase
{
    public function testToStringMove()
    {
        $move = new Move(new Queen(new BoardCoordinates(3,3),true),new BoardCoordinates(4,4), false);
        
        self::assertEquals("Qd4-e5",$move->toString());
    }
    
    public function testToStringCapture()
    {
        $move = new Move(new Queen(new BoardCoordinates(3,3),true),new BoardCoordinates(4,4), true);
        
        self::assertEquals("Qd4xe5",$move->toString());
    }
    
    public function testFromStringTrue()
    {
        $move = new Move(new Pawn(new BoardCoordinates(3,1), true), new BoardCoordinates(3,4), false);
        
        $moveFromString = Move::fromString($move->toString(), true);
        
        self::assertEquals($move,$moveFromString);
    }
    
    public function testFromStringFalse()
    {
        $move = new Move(new Pawn(new BoardCoordinates(3,1), true), new BoardCoordinates(3,4), false);
        
        $moveTwo = new Move(new Pawn(new BoardCoordinates(2,1), true), new BoardCoordinates(4,3), false);
        
        $moveFromString = Move::fromString($moveTwo->toString(), true);
        
        self::assertNotEquals($move,$moveFromString);
    }
    
    public function testFromStringAllPieces()
    {
        $move = new Move(new Knight(new BoardCoordinates(3,1), true), new BoardCoordinates(4,3), false);
        
        $moveFromString = Move::fromString($move->toString(), true);
        
        self::assertEquals($move,$moveFromString);
        
        $move = new Move(new Bishop(new BoardCoordinates(3,1), true), new BoardCoordinates(4,3), false);
        
        $moveFromString = Move::fromString($move->toString(), true);
        
        self::assertEquals($move,$moveFromString);
        
        $move = new Move(new Rook(new BoardCoordinates(3,1), true), new BoardCoordinates(4,3), false);
        
        $moveFromString = Move::fromString($move->toString(), true);
        
        self::assertEquals($move,$moveFromString);
        
        $move = new Move(new Queen(new BoardCoordinates(3,1), true), new BoardCoordinates(4,3), false);
        
        $moveFromString = Move::fromString($move->toString(), true);
        
        self::assertEquals($move,$moveFromString);
        
        $move = new Move(new King(new BoardCoordinates(3,1), true), new BoardCoordinates(4,3), false);
        
        $moveFromString = Move::fromString($move->toString(), true);
        
        self::assertEquals($move,$moveFromString);
        
    }
    
    public function testFromStringCapture()
    {
        $move = new Move(new Knight(new BoardCoordinates(3,1), true), new BoardCoordinates(4,3), true);
        
        $moveFromString = Move::fromString($move->toString(), true);
        
        self::assertEquals($move,$moveFromString);
    }
    
    public function testIsACaptureTrue()
    {
        $moveTrue = new Move(new Knight(new BoardCoordinates(3,1), true), new BoardCoordinates(4,3), true);
    
        self::assertTrue($moveTrue->isACapture());
    }
    
    public function testIsACaptureFalse()
    {
        $moveFalse = new Move(new Knight(new BoardCoordinates(3,1), true), new BoardCoordinates(4,3), false);
        
        self::assertFalse($moveFalse->isACapture());
    }
    
    public function testGetPieceTrue()
    {
        $piece = new Knight(new BoardCoordinates(3,1), true);
        
        $move = new Move($piece, new BoardCoordinates(4,3), true);
        
        self::assertEquals($piece, $move->getPiece());
    }
    
    public function testGetPieceFalse()
    {
        $piece = new Knight(new BoardCoordinates(3,1), true);
        
        $move = new Move($piece, new BoardCoordinates(4,3), true);
        
        self::assertNotEquals(new Knight(new BoardCoordinates(4,1), true), $move->getPiece());
    }
    
    public function testGetCoordinatesTrue()
    {
        $coordinates = new BoardCoordinates(4,3);
        
        $move = new Move(new Knight(new BoardCoordinates(3,1), true), $coordinates, true);
        
        self::assertTrue($move->getCoordinates()->isEqualTo($coordinates));
    }
    
    public function testGetCoordinatesFalse()
    {
        $coordinates = new BoardCoordinates(4,3);
        
        $move = new Move(new Knight(new BoardCoordinates(3,1), true), $coordinates, true);
        
        self::assertFalse($move->getCoordinates()->isEqualTo(new BoardCoordinates(7,3)));
    }
}

