<?php

namespace MattKirwan\PagePackage\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Dbal\Connection;

class PageType extends AbstractType
{
	private $conn;
	private $security;

	public function __construct(\Doctrine\Dbal\Connection $conn, $security = null)
	{
		$this->conn = $conn;
		$this->security = $security;
	}

	public function buildForm(FormBuilderInterface $builder, array $option)
	{
		$builder->add('title', 'text', array(
			'constraints' => array(new Assert\NotBlank()),
			'label' => 'Page Title',
			'attr' => array('class' => 'span12'),
		));

		$builder->add('slug', 'text', array(
			'constraints' => array(new Assert\NotBlank()),
			'read_only' => true,
			'attr' => array('class' => 'span12'),
		));

		$builder->add('excerpt', 'text', array(
			'constraints' => array(new Assert\NotBlank()),
			'attr' => array('class' => 'span12'),
		));

		$builder->add('data', 'textarea', array(
			'constraints' => array(new Assert\NotBlank()),
			'attr' => array('class' => 'tiny_mce span12'),
		));

	}

	public function getName()
	{
		return 'page';
	}
}