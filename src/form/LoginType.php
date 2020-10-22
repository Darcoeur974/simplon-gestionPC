<?php


namespace App\form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class LoginType extends AbstractType
{
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', null, [
                'required' => true,
                'label'    => 'Email',
                'label_attr' => [
                    'class'       => 'mt-3',
                ],
                'attr'     => [
                    'class'       => 'form-control',
                    'placeholder' => 'Votre email',
                ],
            ])
            ->add('password', PasswordType::class, [
                'required' => true,
                'label'    => 'Mot de passe',
                'label_attr' => [
                    'class'       => 'mt-3',
                ],
                'attr'     => [
                    'class'       => 'form-control',
                    'placeholder' => 'Votre mot de passe',
                ],
            ])
            ->add('save', SubmitType::class, ['label' => 'Se connecter'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
