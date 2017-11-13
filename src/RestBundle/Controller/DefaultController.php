<?php

namespace RestBundle\Controller;

use RestBundle\Entity\Post;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/posts", name="get_posts")
     * @Method({"GET"})
     * @return JsonResponse
     */
    public function getPostsAction()
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);

        $posts = $repository->findBy(array(), array('id' => 'desc'));

        return new JsonResponse($posts);
    }

    /**
     * @Route("/posts", name="add_post")
     * @Method({"POST"})
     * @param Request $request
     * @return Response
     */
    public function addPostsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $post = new Post($request->request->get("name"), $request->request->get("message"));

        $em->persist($post);

        $em->flush();

        return new Response("Accepted", Response::HTTP_ACCEPTED);
    }
}
