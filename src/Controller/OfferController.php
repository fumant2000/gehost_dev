<?php

namespace App\Controller;

use App\Entity\Offer;
use FOS\RestBundle\View\View;
use App\Repository\OfferRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("api", name="api_")
 */
class OfferController extends AbstractController
{
    /**
     * @var OfferRepository
     */
    private $offerRepository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(OfferRepository $offerRepository, EntityManagerInterface $entityManager)
    {
        $this->offerRepository = $offerRepository;
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/offer", name="offer")
     * @param Request $request
     */
    public function indexOffer(Request $request):JsonResponse
    {
        $data = $request->toArray();
        $title=$data["title"];
        $offers=$this->offerRepository->findBy(["title"=>$title]);
        return new JsonResponse(["data"=>$offers]);
        //$this->view(["data"=>$offers], Response::HTTP_OK);
    }
}