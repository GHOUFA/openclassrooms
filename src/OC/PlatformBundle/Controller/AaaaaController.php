<?php

namespace OC\PlatformBundle\Controller;

use OC\PlatformBundle\Entity\Aaaaa;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AaaaaController extends Controller
{
 
     public function indexAction()
  {
    
    return $this->render('OCPlatformBundle:Aaaaa:standard_layout.html.twig');
  }

       protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('export_pdf', $this->getRouterIdParameter() . '/export-pdf');
        $collection->add('export_all_pdf', 'export-all-pdf');
    }
}
