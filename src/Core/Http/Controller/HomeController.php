<?php


namespace App\Core\Http\Controller;

use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Core\Http\Controller
 * @Route(path="/")
 */
class HomeController
{
    public function __invoke()
    {
        return 'hello world';
    }
}