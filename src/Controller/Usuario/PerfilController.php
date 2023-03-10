<?php

namespace App\Controller\Usuario;

use App\Entity\Perfil;
use App\Form\Usuario\PerfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PerfilController extends AbstractController
{
    #[Route('/usuario/perfil/lista', name: 'usuario_perfil_lista')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $arPerfil = $em->getRepository(Perfil::class)->find(1);

        $form = $this->createForm(PerfilType::class, $arPerfil);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('btnGuardar')->isClicked()) {
                $arPerfil = $form->getData();
                $em->persist($arPerfil);
                $em->flush();
            }
        }

        $arHojaVida = $em->getRepository(Perfil::class)->hojaVida(1);

        return $this->render('usuario/perfil/index.html.twig', [
            'form' => $form->createView(),
            'arHojaVida' => $arHojaVida
        ]);
    }
}
