<?php
namespace UPJV\AuthModule\Factory;


use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Form\Form;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class FormLoginFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $form = new Form('auth');
        $form->add([
            'type' => \Zend\Form\Element\Text::class,
            'name' => 'login',
            'attributes' => [
                'size' => '20',
            ],
            'options' => [
                'label' => 'Login : ',
            ],
        ]);
        $form->add([
            'type' => \Zend\Form\Element\Password::class,
            'name' => 'pass',
            'attributes' => [
                'size' => '20',
            ],
            'options' => [
                'label' => 'Password : ',
            ],
        ]);
        $form->add([
            'type' => \Zend\Form\Element\Button::class,
            'name' => 'ident',
            'attributes' => [
                'type' => 'submit',
            ],
            'options' => [
                'label' => 'Soumettre',
            ],
        ]);
        return $form;
    }
}