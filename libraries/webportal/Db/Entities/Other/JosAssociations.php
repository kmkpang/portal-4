<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosAssociations
 *
 * @ORM\Table(name="jos_associations", indexes={@ORM\Index(name="idx_key", columns={"key"})})
 * @ORM\Entity
 */
class JosAssociations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="A reference to the associated item."})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="context", type="string", length=50, nullable=false, options={"comment"="The context of the associated item."})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $context;

    /**
     * @var string
     *
     * @ORM\Column(name="key", type="string", length=32, nullable=false, options={"fixed"=true,"comment"="The key for the association computed from an md5 on associated ids."})
     */
    private $key;


    /**
     * Set id.
     *
     * @param int $id
     *
     * @return JosAssociations
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set context.
     *
     * @param string $context
     *
     * @return JosAssociations
     */
    public function setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Get context.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set key.
     *
     * @param string $key
     *
     * @return JosAssociations
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }
}
