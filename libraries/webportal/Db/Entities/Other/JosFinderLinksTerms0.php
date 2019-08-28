<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosFinderLinksTerms0
 *
 * @ORM\Table(name="jos_finder_links_terms0", indexes={@ORM\Index(name="idx_term_weight", columns={"term_id", "weight"}), @ORM\Index(name="idx_link_term_weight", columns={"link_id", "term_id", "weight"})})
 * @ORM\Entity
 */
class JosFinderLinksTerms0
{
    /**
     * @var int
     *
     * @ORM\Column(name="link_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $linkId;

    /**
     * @var int
     *
     * @ORM\Column(name="term_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $termId;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", precision=10, scale=0, nullable=false)
     */
    private $weight;


    /**
     * Set linkId.
     *
     * @param int $linkId
     *
     * @return JosFinderLinksTerms0
     */
    public function setLinkId($linkId)
    {
        $this->linkId = $linkId;

        return $this;
    }

    /**
     * Get linkId.
     *
     * @return int
     */
    public function getLinkId()
    {
        return $this->linkId;
    }

    /**
     * Set termId.
     *
     * @param int $termId
     *
     * @return JosFinderLinksTerms0
     */
    public function setTermId($termId)
    {
        $this->termId = $termId;

        return $this;
    }

    /**
     * Get termId.
     *
     * @return int
     */
    public function getTermId()
    {
        return $this->termId;
    }

    /**
     * Set weight.
     *
     * @param float $weight
     *
     * @return JosFinderLinksTerms0
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight.
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }
}
