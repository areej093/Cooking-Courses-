<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Form\RecipeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    /**
     * @Route("/recipes", name="recipes_index")
     */
    public function index(): Response
    {
        $recipes = $this->getDoctrine()->getRepository(Recipe::class)->findAll();

        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipes,
        ]);
    }
/**
 * @Route("/recipe/delete/{id}", name="recipe_delete", methods={"POST"})
 */
public function delete(Request $request, Recipe $recipe): Response
{
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($recipe);
    $entityManager->flush();

    return $this->redirectToRoute('recipes_index');
}
/**
 * @Route("/recipe/add/{id}", name="recipe_add", methods={"POST"})
 */
public function add(Request $request, Recipe $recipe): Response
{
    // Clonez la recette existante pour éviter de modifier l'originale
    $newRecipe = clone $recipe;

    // Modifiez les propriétés de la nouvelle recette si nécessaire
    // Par exemple, vous pourriez réinitialiser l'ID pour éviter les conflits
    $newRecipe->setId(null);

    // Ajoutez la nouvelle recette à l'EntityManager
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($newRecipe);
    $entityManager->flush();

    // Redirigez vers la page d'index des recettes
    return $this->redirectToRoute('recipes_index');
    
}
    


}
