<?php

declare(strict_types=1);

class BattleResult
{
    private ?Ship $winner;
    private ?Ship $looser;
    private bool $isJediPowerUsed;
    private ?int $winnerHP;
    private ?int $looserHP;



    public function __construct(
        ?Ship $winner,
        ?Ship $looser,
        bool $isJediPowerUsed,
        ?int $winnerHP,
        ?int $looserHP
    ) {
        $this->winner = $winner;
        $this->looser = $looser;
        $this->isJediPowerUsed = $isJediPowerUsed;
        $this->winnerHP = $winnerHP;
        $this->looserHP = $looserHP;
    }

    public function getWinnerHP(): ?int
    {
        return $this->winnerHP;
    }


    public function getlooserHP(): ?int
    {
        return $this->looserHP;
    }

    public function getWinner(): ?Ship
    {
        return $this->winner;
    }

    public function getLooser(): ?Ship
    {
        return $this->looser;
    }

    public function isJediPowerUsed(): bool
    {
        return $this->isJediPowerUsed;
    }

    public function isThereAWinner(): bool
    {
        return $this->getWinner() !== null;
    }



}