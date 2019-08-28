<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosFinderTaxonomyMap
 *
 * @ORM\Table(name="jos_finder_taxonomy_map", indexes={@ORM\Index(name="link_id", columns={"link_id"}), @ORM\Index(name="node_id", columns={"node_id"})})
 * @ORM\Entity
 */
class JosFinderTaxonomyMap
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
     * @ORM\Column(name="node_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nodeId;


    /**
     * Set linkId.
     *
     * @param int $linkId
     *
     * @return JosFinderTaxonomyMap
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
     * Set nodeId.
     *
     * @param int $nodeId
     *
     * @return JosFinderTaxonomyMap
     */
    public function setNodeId($nodeId)
    {
        $this->nodeId = $nodeId;

        return $this;
    }

    /**
     * Get nodeId.
     *
     * @return int
     */
    public function getNodeId()
    {
        return $this->nodeId;
    }
}
