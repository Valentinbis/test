<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaskController extends AbstractController
{
    /**
     * @Route("/tasks/listing/", name="tasks_listing")
     */
    public function taskListing(): Response
    {
        // On va chercher par doctrine le repository de nos Task
        $repository = $this->getDoctrine()->getRepository(Task::class);

        // dans ce repository nous récupérons toutes les données
        $tasks = $repository->findAll();

        // affichage des données dans le var_dumper
        dd($tasks);
        return $this->render('task/index.html.twig', [
            'tasks' => $tasks,
        ]);
    }
}
