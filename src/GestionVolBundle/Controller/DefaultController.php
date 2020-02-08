<?php

namespace GestionVolBundle\Controller;

use GestionVolBundle\Entity\passager;
use GestionVolBundle\Entity\vol;
use GestionVolBundle\Form\passagerType;
use GestionVolBundle\Form\volType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@GestionVol/Default/index.html.twig');
    }
    public function ajoutevolAction(Request $request)
    {
        $vol=new vol() ;
        $form = $this->createForm(volType::class,$vol);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vol);
            $em->flush();
        }


        return $this->render('@GestionVol/Default/ajoutevol.html.twig',array('form' => $form->createView(),));
    }
    public function ajoutebagageAction(Request $request,$id)
    {
        $bagage=$this->getDoctrine()->getRepository(passager::class)->find($id);
        $form = $this->createForm(passagerType::class,$bagage);
        $form->handleRequest($request);
        if ($form->isValid()){
            /**
             * @var UploadedFile $file
             *
             */
            $file=$bagage->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'),$fileName
            );
            $bagage->setImage($fileName);
            $em=$this->getDoctrine()->getManager();
            $em->persist($bagage);
            $em->flush();

            return $this->redirectToRoute("affichevol");
        }
        return $this->render('@GestionVol/Default/ajoutebagage.html.twig',array('form' => $form->createView(),));
    }




    public function afficheAction()
    {$em = $this ->getDoctrine()->getManager();
        $ens = $em->getRepository('GestionVolBundle:passager')->findAll();



        return $this->render('@GestionVol/Default/affiche.html.twig',array('ens' => $ens,));
    }
}
