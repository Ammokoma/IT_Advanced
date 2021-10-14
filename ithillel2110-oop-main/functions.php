<?php

require __DIR__ . '/Ship.php';

function get_ships(): array

{

    $Ships['starfighter'] = new Ship();
    $Ships['starfighter']
        ->setName('Starfighter')
        ->setWeaponPower(5)
        ->setStrength(30)
        ->setJediFactor(15);

    $Ships['cloakshape_fighter'] = new Ship();
    $Ships['cloakshape_fighter']
        ->setName('cloakshape fighter')
        ->setWeaponPower(2)
        ->setStrength(70)
        ->setJediFactor(2);

    $Ships['super_star_destroyer'] = new Ship();
    $Ships['super_star_destroyer']
        ->setName('super star destroyer')
        ->setWeaponPower(70)
        ->setStrength(500)
        ->setJediFactor(0);

    $Ships['rz1_a_wing_interceptor'] = new Ship();
    $Ships['rz1_a_wing_interceptor']
        ->setName('rz1 a wing interceptor')
        ->setWeaponPower(4)
        ->setStrength(50)
        ->setJediFactor(4);

    return $Ships;

}

/**
 * Our complex fighting algorithm!
 *
 * @param array $ship1
 * @param $ship1Quantity
 * @param array $ship2
 * @param $ship2Quantity
 * @return array With keys winning_ship, losing_ship & used_jedi_powers
 */
function battle(Ship $ship1, $ship1Quantity, Ship $ship2, $ship2Quantity): array
{
    $ship1Health = $ship1->getStrength() * $ship1Quantity;
    $ship2Health = $ship2->getStrength() * $ship2Quantity;

    $ship1UsedJediPowers = false;
    $ship2UsedJediPowers = false;
    while ($ship1Health > 0 && $ship2Health > 0) {
        if (isJediDestroyShipUsingTheForce($ship1)) {
            $ship2Health = 0;
            $ship1UsedJediPowers = true;

            break;
        }
        if (isJediDestroyShipUsingTheForce($ship2)) {
            $ship1Health = 0;
            $ship2UsedJediPowers = true;

            break;
        }

        $ship1Health -= ($ship2->getWeaponPower() * $ship2Quantity);
        $ship2Health -= ($ship1->getWeaponPower() * $ship1Quantity);
    }

    if ($ship1Health <= 0 && $ship2Health <= 0) {
        $winningShip = null;
        $losingShip = null;
        $usedJediPowers = $ship1UsedJediPowers || $ship2UsedJediPowers;
    } elseif ($ship1Health <= 0) {
        $winningShip = $ship2;
        $losingShip = $ship1;
        $usedJediPowers = $ship2UsedJediPowers;
    } else {
        $winningShip = $ship1;
        $losingShip = $ship2;
        $usedJediPowers = $ship1UsedJediPowers;
    }

    return [
        'winning_ship' => $winningShip,
        'losing_ship' => $losingShip,
        'used_jedi_powers' => $usedJediPowers,
    ];
}

function isJediDestroyShipUsingTheForce(Ship $ship): bool
{
    return mt_rand(1, 100) <= $ship->getJediFactor();
}