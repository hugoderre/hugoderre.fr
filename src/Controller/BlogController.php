<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\Type\PostType;
use App\Repository\PostRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Repository\RepositoryFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{

    #[Route('/blog', name: 'blog')]
    // #[ParamConverter('post')]
    public function all(PostRepository $postRepository): Response
    {
        
        $posts = $postRepository->findAll();
        
        return $this->render('blog/blog.html.twig', [
            'controller_name'   => 'BlogController',
            'posts'             => $posts,
        ]);
        
    }
    
    #[Route('/blog/create', name: 'create')]
    // #[ParamConverter('post')]
    public function createPostInterface(Request $request, FormFactoryInterface $formFactoryInterface): Response
    {
        $post = new Post();

        $builder = $formFactoryInterface->createBuilder(PostType::class, $post);

        $form = $builder->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());
            // $this->redirectToRoute('blog');
        }

        return $this->renderForm('admin/post/create.html.twig', [
            'form' => $form
        ]);
        
        // $post = new Post();

        // $post->setTitle('Hello world')
        //      ->setContent('Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas veritatis mollitia incidunt sint, quae dolore quidem, explicabo itaque aperiam reiciendis dicta quia tenetur placeat, nemo rerum? Excepturi officiis consequatur nihil.')
        //      ->setThumbnail('https://picsum.photos/200/300')
        //      ->setCreatedAt(new DateTimeImmutable())
        //      ->setIsPublished(true);

        // $manager = $this->getDoctrine()->getManager();
        // $manager->persist($post);
        // $manager->flush();

        // return $this->render('');

    }

    #[Route('/blog/{id}', name: 'post')]
    // #[ParamConverter('post')]
    public function post($id, Post $post): Response
    {
        
        // dd($post);

        return $this->render('blog/single.html.twig', [
            'post' => $post
            
        ]);

    }

    
}
?>

