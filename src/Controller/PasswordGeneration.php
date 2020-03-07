<?php
/*
 * This file is part of Skletter <https://github.com/2DSharp/Skletter>.
 *
 * (c) Dedipyaman Das <2d@twodee.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace WebHunt\Controller;

use Symfony\Component\HttpFoundation\Request;
use WebHunt\Model\Mapper\TeamMapper;

class PasswordGeneration
{
    /**
     * @var TeamMapper
     */
    private TeamMapper $credentialStore;

    public function __construct(TeamMapper $credentialStore)
    {
        $this->credentialStore = $credentialStore;
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function generateMap(Request $request)
    {
        echo "hoo";
        $creds = [];
        for ($i = 0; $i < 5; $i++) {
            $rand = $this->randomPassword();
            array_push($creds, $rand);
            echo $rand . "<p>";
        }
        $this->credentialStore->storeInBulk($creds);
    }
}