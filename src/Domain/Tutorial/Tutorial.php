<?php


namespace App\Domain\Tutorial;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class Tutorial
 * @package App\Domain\Tutorial
 * @ORM\Entity()
 * @Vich\Uploadable()
 */
class Tutorial
{

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $banner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @Vich\UploadableField(mapping="tutorial.banners", fileNameProperty="banner")
     */
    private $bannerFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

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
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return mixed
     */
    public function getBanner()
    {
        return $this->banner;
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
    public function getTitle()
    {
        return $this->title;
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
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @param mixed $title
     * @return Tutorial
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     */
    public function setUpdatedAt(): self
    {
        $this->updatedAt = new \DateTime('now');

        return $this;
    }
}