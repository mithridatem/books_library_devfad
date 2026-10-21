<?php

namespace App\Service;

use App\Repository\CategoryRepository;
use App\Entity\Category;
use App\Utils\Tools;
use Mithridatem\Validation\Validator;
use Mithridatem\Validation\ValidationError;

class CategoryService
{
    private CategoryRepository $categoryRepository;
    private Validator $validator;

    //injection de dépendance
    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
        $this->validator = new Validator();
    }

    /**
     * Méthode qui retourne la liste de toutes les categories
     * @return array<Category> $categories Tableau objet Category
     */
    public function getAllCategories(): array
    {
        return $this->categoryRepository->findAll();
    }

    /**
     * Méthode qui gére la logique d'ajout de categorie
     * @return array $errors 
     */
    public function insertCategory(): array
    {
        //Tableau Erreurs
        $errors = [];

        //1 Nettoyage des données
        Tools::sanitizeArray($_POST);

        //2 Validations
        //3 Hydratation en Objet Category
        $newCategory = Category::hydrate($_POST);

        //4 Récupérer les erreurs de validations
        $errors_validation =  $this->validator->validate($newCategory);

        //5 Test si il y à des erreurs de validation (champ vide, taille min: 2 max : 50)
        if (!empty($errors_validation)) {
            //ajouter au tableau
            $errors["validation"] = $errors_validation;
            return $errors;
        }

        //6 Récupération de la catégorie
        $category = $this->categoryRepository->findByName($_POST["category_name"]);

        //7 Test si la catégorie existe déja
        if ($category) {
            $errors["error"] = "La categorie : " . $_POST["category_name"] .  " existe déja";
            return $errors;
        }

        //8 Ajout en BDD
        $this->categoryRepository->create($newCategory);

        //9 Messsage de success
        $errors["success"] = "La catégorie : " . $_POST["category_name"] . " a été ajouté avec succés";

        return $errors;
    }
}
