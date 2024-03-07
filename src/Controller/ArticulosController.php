<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class ArticulosController extends AbstractController
{
    private $articulos = [
        [
            'id' => 1,
            'title' => 'Articulo 1',
            'created' => '2021-10-01',
        ],
        [
            'id' => 2,
            'title' => 'Articulo 2',
            'created' => '2021-10-02',
        ],
        [
            'id' => 3,
            'title' => 'Articulo 3',
            'created' => '2021-10-03',
        ],
        [
            'id' => 4,
            'title' => 'Articulo 4',
            'created' => '2021-10-04',
        ],
        [
            'id' => 5,
            'title' => 'Articulo 5',
            'created' => '2021-10-05',
        ]
    ];

    #[Route('/articulos', name: 'articulos')]
    public function show_articulos(): Response
    {
        return $this->render('mostrar_articulos.html.twig', [
            'articulos' => $this->articulos
        ]);
    }


    #[Route('/articulo/{id}', name: 'articulo_id')]
    public function find_articulo($id = 2): Response
    {
        $articulo = array_filter($this->articulos, function ($a) use ($id) {
            return $a['id'] == $id;
        });

        if ($id == 1) {
            return $this->redirectToRoute('articulo_1');
        } else {
            return $this->render('mostrar_articulo.html.twig', [
                'articulo' => array_pop($articulo)
            ]);
        }
    }

    #[Route('/articulo1', name: 'articulo_1')]
    public function find_articulo_1(): Response
    {
        $articulo = $this->articulos[0];

        return $this->render('articulo1.html.twig', [
            'articulo' => $articulo
        ]);
    }
}
