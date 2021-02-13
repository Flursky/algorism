<?php

namespace App\Domain\Review;

use App\Http\Admin\ReviewCrudController;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Table(name="review")
 * @ORM\Entity()
 * @Vich\Uploadable()
 */
class Review
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $title;

    // TODO: upload content as bespoke presentation

    /**
     * @Vich\UploadableField(mapping="review.slides", fileNameProperty="content")
     */
    private $contentFile;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $content;

    /**
     * @Vich\UploadableField(mapping="review.banners", fileNameProperty="banner")
     */
    private $bannerFile;

    /**
     * @ORM\Column(type="string")
     */
    private $banner;

    /**
     * Paper Bibtex reference
     * @ORM\Column(type="string", length=1024, nullable=false)
     */
    private $reference;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $title
     * @return Review
     */
    public function setTitle(string $title): Review
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param mixed $content
     * @return Review
     */
    public function setContent(string $content): Review
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @param mixed $created_at
     * @return Review
     */
    public function setCreatedAt(DateTime $created_at = null): Review
    {
        if ($created_at) {
            $this->created_at = $created_at;
        } else {
            $this->created_at = new DateTime('now');
        }
        return $this;
    }

    /**
     * @param mixed $reference
     * @return Review
     */
    public function setReference(string $reference): Review
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBannerFile()
    {
        return $this->bannerFile;
    }

    /**
     * @return mixed
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * @param mixed $banner
     */
    public function setBanner($banner): void
    {
        $this->banner = $banner;
    }

    /**
     * @param mixed $bannerFile
     */
    public function setBannerFile($bannerFile = null): void
    {
        $this->bannerFile = $bannerFile;

        if ($bannerFile) {
            $this->updated_at = new DateTime('now');
        }
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     * @return Review
     */
    public function setUpdatedAt($updated_at): Review
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContentFile()
    {
        return $this->contentFile;
    }

    /**
     * @param mixed $contentFile
     * @return Review
     */
    public function setContentFile($contentFile = null): Review
    {
        $this->contentFile = $contentFile;

        if ($contentFile) {
            $this->updated_at = new DateTime('now');
        }

        return $this;
    }
}