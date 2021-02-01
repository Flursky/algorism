<?php


namespace App\Core\Http\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Class HomeController
 * @package App\Core\Http\Controller
 * @Route(path="/")
 */
class HomeController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('home/index.html.twig');
    }
}