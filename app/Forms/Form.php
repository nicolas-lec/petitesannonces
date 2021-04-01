<?php
namespace  App\Forms;


class Form extends \Kris\LaravelFormBuilder\Form {

    protected $ressource = '';

    public function buildForm()
    {
        if ($this->getModel() && $this->getModel()->id)
        {
            $method = 'PUT';
            $url = route('posts.update', $this->getModel()->id);
        }
        else
        {
            $method = 'POST' ;
            $url = route ('posts.store');
        }

        $this->formOptions = [
            'method' => $method,
            'url' => $url
        ];

        parent::buildForm();
    }

    public function redirectIfNotValid($destination = null)
    {
        $values = $this->getFieldValues();
        foreach ($values as $name => $value){
            $this->getModel()->$name=$value ;
        }
        parent::redirectIfNotValid($destination);
    }

}
