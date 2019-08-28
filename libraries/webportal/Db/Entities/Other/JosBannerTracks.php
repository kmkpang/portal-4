<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosBannerTracks
 *
 * @ORM\Table(name="jos_banner_tracks", indexes={@ORM\Index(name="idx_track_date", columns={"track_date"}), @ORM\Index(name="idx_track_type", columns={"track_type"}), @ORM\Index(name="idx_banner_id", columns={"banner_id"})})
 * @ORM\Entity
 */
class JosBannerTracks
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="track_date", type="datetime", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $trackDate;

    /**
     * @var int
     *
     * @ORM\Column(name="track_type", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $trackType;

    /**
     * @var int
     *
     * @ORM\Column(name="banner_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $bannerId;

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $count = '0';


    /**
     * Set trackDate.
     *
     * @param \DateTime $trackDate
     *
     * @return JosBannerTracks
     */
    public function setTrackDate($trackDate)
    {
        $this->trackDate = $trackDate;

        return $this;
    }

    /**
     * Get trackDate.
     *
     * @return \DateTime
     */
    public function getTrackDate()
    {
        return $this->trackDate;
    }

    /**
     * Set trackType.
     *
     * @param int $trackType
     *
     * @return JosBannerTracks
     */
    public function setTrackType($trackType)
    {
        $this->trackType = $trackType;

        return $this;
    }

    /**
     * Get trackType.
     *
     * @return int
     */
    public function getTrackType()
    {
        return $this->trackType;
    }

    /**
     * Set bannerId.
     *
     * @param int $bannerId
     *
     * @return JosBannerTracks
     */
    public function setBannerId($bannerId)
    {
        $this->bannerId = $bannerId;

        return $this;
    }

    /**
     * Get bannerId.
     *
     * @return int
     */
    public function getBannerId()
    {
        return $this->bannerId;
    }

    /**
     * Set count.
     *
     * @param int $count
     *
     * @return JosBannerTracks
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }
}
