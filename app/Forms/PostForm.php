<?php

namespace App\Forms;



use function Symfony\Component\String\u;

class PostForm extends Form
{
    protected $ressource = 'posts' ;

    public function buildForm()
    {
        parent::buildForm();

        $this
            ->add('title', 'text',[
                'label' => 'Titre de l\'annonce',
                'required' => true,
            ])
            ->add('slug', 'text', [
                'label' => 'Slug de l\'annonce'
            ])
            ->add('content', 'textarea', [
                'label' => 'Description de l\'annonce',
            ])
            ->add('created_at', 'date', [
                'label' => 'Creation de l\'annonce'
            ]);


        $this->add('submit', 'submit', [
            'label' => 'Envoyer'
        ]);

    }
}
