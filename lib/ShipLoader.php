<?php

declare(strict_types=1);

class ShipLoader
{
    public function getShips(): array
    {
        $startfighter = (new Ship('Starfighter'))
            ->setWeaponPower(5)
            ->setJediFactor(15)
            ->setStrength(30)
        ;

        $cloakshapeFighter = (new Ship('CloakShape Fighter'))
            ->setStrength(70)
            ->setJediFactor(2)
            ->setWeaponPower(2)
        ;

        $superStarDestroyer = (new Ship('Super Star Destroyer'))
            ->setWeaponPower(70)
            ->setJediFactor(0)
            ->setStrength(500)
        ;

        $rz1AWingInterceptor = (new Ship('RZ-1 A-wing interceptor'))
            ->setWeaponPower(4)
            ->setJediFactor(4)
            ->setStrength(50)
        ;

        return [
            'starfighter' => $startfighter,
            'cloakshape_fighter' => $cloakshapeFighter,
            'super_star_destroyer' => $superStarDestroyer,
            'rz1_a_wing_interceptor' => $rz1AWingInterceptor,
        ];
    }

}