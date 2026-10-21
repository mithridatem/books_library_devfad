<?php

namespace App\Entity;

use Mithridatem\Validation\Attributes\Length;
use Mithridatem\Validation\Attributes\NotBlank;

class Category
{
<<<<<<< HEAD
    private int $id;
    private string $name;

    public function __construct(
        string $name
    ) {
        $this->name = $name;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setId(int $id): void {
         $this->id = $id;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    // Méthode
    public static function hydrate(array $data): Category 
    {
        $newCategory = new Category($data["category_name"]);
        $newCategory->setId($data["id_category"]);
        return $newCategory;
    }
}
=======
    private ?int $id;

    #[NotBlank]
    #[Length(min: 2, max: 50)]
    private ?string $name;

    public function __construct(?string $name)
    {
        $this->name = $name;
    }

    //Getters et Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setName(?string  $name): void
    {
        $this->name = $name;
    }

    //Méthode pour transformer un tableau en objet Category
    public static function hydrate(array $category): Category
    {
        //Instance de la category
        $newCategory = new Category($category["category_name"] ?? null);

        //test si categoryId existe
        if (isset($category["id"])) {
            $newCategory->setId($category["id"]);
        }
        //retourner un objet Category
        return $newCategory;
    }
}
>>>>>>> 9c0243437cb34a7e20e67ea9b957bbd31c897579
