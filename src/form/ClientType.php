<?php

namespace App\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ClientType extends AbstractType
{
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', null, [
                'required' => true,
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'mt-3',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom',
                ],
            ])
            ->add('firstname', null, [
                'required' => true,
                'label' => 'prénom',
                'label_attr' => [
                    'class' => 'mt-3',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'prénom',
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Ajouter',
                'attr' => [
                    'class' => 'btn btn-primary mt-2',
                ],
                'row_attr' => [
                    'class' => 'text-right',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'action' => $this->urlGenerator->generate('client.new'),
            'method' => 'POST',
            'attr' => [
                'id' => 'client-new',
            ],
        ]);
    }
}
