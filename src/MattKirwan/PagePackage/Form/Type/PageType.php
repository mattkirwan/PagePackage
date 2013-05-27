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
			'label' => 'Page Title',
			'attr' => array('class' => 'span12'),
		));

		$builder->add('slug', 'text', array(
			'read_only' => true,
			'attr' => array('class' => 'span12'),
		));

		$builder->add('excerpt', 'text', array(
			'attr' => array('class' => 'span12'),
		));

		$builder->add('data', 'textarea', array(
			'attr' => array('class' => 'tiny_mce span12'),
		));

	}

	public function getName()
	{
		return 'page';
	}
}