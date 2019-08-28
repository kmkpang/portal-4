<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosOverrider
 *
 * @ORM\Table(name="jos_overrider")
 * @ORM\Entity
 */
class JosOverrider
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="Primary Key"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="constant", type="string", length=255, nullable=false)
     */
    private $constant;

    /**
     * @var string
     *
     * @ORM\Column(name="string", type="text", length=65535, nullable=false)
     */
    private $string;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=255, nullable=false)
     */
    private $file;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set constant.
     *
     * @param string $constant
     *
     * @return JosOverrider
     */
    public function setConstant($constant)
    {
        $this->constant = $constant;

        return $this;
    }

    /**
     * Get constant.
     *
     * @return string
     */
    public function getConstant()
    {
        return $this->constant;
    }

    /**
     * Set string.
     *
     * @param string $string
     *
     * @return JosOverrider
     */
    public function setString($string)
    {
        $this->string = $string;

        return $this;
    }

    /**
     * Get string.
     *
     * @return string
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * Set file.
     *
     * @param string $file
     *
     * @return JosOverrider
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file.
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }
}
