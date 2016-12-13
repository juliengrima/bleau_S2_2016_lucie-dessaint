<?php

namespace LucieDesaintBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraint as Assert;

/**
 * Artiste
 */
class Artiste
{
    // Code code creé par Pascal

    Public $file;

    // fonction de methode upload

    // generation d'un nom unique
    Public function preUpload()
    {
        if (null !== $this->file)
        {
           // si le nom du fichier es different on génère un nom unique
            $this->textback=uniqid().'.'.$this->file->guessExtension();
        }
    }

    // Si le fichier est vide il le suuprime par sécurité
    Public function upload()
    {
        if (null === $this->file)
        {
            return;
        }

        $this->file->move($this->getUploadRootDir(), $this->textback);
        unset ($this->file);
    }

    Public function removeUpload()
    {
        if ($file= $this->getAbsolutePath())
        {
           unlink($file);
        }
    }

    Protected function getUploadDir()
    {
    return 'upload/artiste';
    }

    Protected function getUploadRootDir()
    {
    return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    Public function getWebPath()
    {
        return null === $this->textback ? null: $this->getUploadDir().'/'. $this->textback;
    }

    Public function getAbsolutePath()
    {
        return null === $this->textback ? null: $this->getUploadRootDir().'/'. $this->textback;
    }

    // Code généré par symfony


    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $textepresentation;

    /**
     * @var string
     */
    private $textback;

    /**
     * @var string
     */
    private $textback2;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set textepresentation
     *
     * @param string $textepresentation
     *
     * @return Artiste
     */
    public function setTextepresentation($textepresentation)
    {
        $this->textepresentation = $textepresentation;

        return $this;
    }

    /**
     * Get textepresentation
     *
     * @return string
     */
    public function getTextepresentation()
    {
        return $this->textepresentation;
    }

    /**
     * Set textback
     *
     * @param string $textback
     *
     * @return Artiste
     */
    public function setTextback($textback)
    {
        $this->textback = $textback;

        return $this;
    }

    /**
     * Get textback
     *
     * @return string
     */
    public function getTextback()
    {
        return $this->textback;
    }

    /**
     * Set textback2
     *
     * @param string $textback2
     *
     * @return Artiste
     */
    public function setTextback2($textback2)
    {
        $this->textback2 = $textback2;

        return $this;
    }

    /**
     * Get textback2
     *
     * @return string
     */
    public function getTextback2()
    {
        return $this->textback2;
    }
}
