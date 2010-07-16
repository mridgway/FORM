<?php

namespace Test\Model;

/**
 * @Entity
 * @Table(name="Article")
 * @Form(repositoryClass="Blog\Form\Repository\Article")
 */
class Article extends AbstractModel
{
    /**
     * @var integer
     * @Id @Column(type="integer", name="article_id")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @var string
     * @Column(type="string", name="title", nullable="false", length="255")
     * @Element(type="text", name="title", required="true", minLength="5", maxLength="255")
     */
    protected $title;

    /**
     * @var string
     * @Column(type="text", name="content", nullable="false")
     * @Element(type="textarea", name="content", required="true")
     */
    protected $content;

    /**
     * @var DateTime
     * @Column(type="datetime", name="date", nullable="false")
     * @Element(type="date", name="date")
     */
    protected $date;

    /**
     * @var boolean
     * @Column(type="boolean", name="published", nullable="false")
     * @Element(type="checkbox", name="published")
     */
    protected $published;


    /**
     * @param string $title
     * @param string $content
     * @param DateTime $date
     * @param boolean $published
     */
    public function __construct($title, $content = '', $date = null, $published = false)
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setDate($date);
        $this->setPublished($published);
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param DateTime $date
     * @return Article
     */
    public function setDate(\DateTime $date = null)
    {
        if (null === $date) {
            $date = new \DateTime();
        }
        $this->date = $date;
        return $this;
    }

    /**
     * @param boolean $published
     * @return Article
     */
    public function setPublished($published = true)
    {
        $this->published = $published;
        return $this;
    }
}