<?php
namespace OC\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdvertController extends Controller
{

    public function menuAction()
  {
     $listAdverts = array(
      array('id' => 2, 'title' => 'Recherche développeur Symfony2'),
      array('id' => 5, 'title' => 'Mission de webmaster'),
      array('id' => 9, 'title' => 'Offre de stage webdesigner')
    );

    return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
      'listAdverts' => $listAdverts
    ));
  }

   public function indexAction($page)
  {
   return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
  'listAdverts' => array()
));
  }

  public function viewAction($id)
  {
      $advert = array(
      'title'   => 'Recherche développpeur Symfony2',
      'id'      => $id,
      'author'  => 'Alexandre',
      'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
      'date'    => new \Datetime()
    );

    return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
      'advert' => $advert
    ));
  }

  public function addAction(Request $request)
  {
    
    if ($request->isMethod('POST')) {
     
      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

     return $this->redirectToRoute('oc_platform_view', array('id' => 5));
    }

    return $this->render('OCPlatformBundle:Advert:add.html.twig');
  }

  public function editAction($id, Request $request)
  {
   $advert = array(
      'title'   => 'Recherche développpeur Symfony2',
      'id'      => $id,
      'author'  => 'Alexandre',
      'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla , Tunisie…',
      'date'    => new \Datetime()
    );

    return $this->render('OCPlatformBundle:Advert:edit.html.twig', array(
      'advert' => $advert
    ));
}

  public function deleteAction($id)
  {
   return $this->render('OCPlatformBundle:Advert:delete.html.twig');
  }
}

