<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosFinderTerms
 *
 * @ORM\Table(name="jos_finder_terms", uniqueConstraints={@ORM\UniqueConstraint(name="idx_term", columns={"term"})}, indexes={@ORM\Index(name="idx_term_phrase", columns={"term", "phrase"}), @ORM\Index(name="idx_stem_phrase", columns={"stem", "phrase"}), @ORM\Index(name="idx_soundex_phrase", columns={"soundex", "phrase"})})
 * @ORM\Entity
 */
class JosFinderTerms
{
    /**
     * @var int
     *
     * @ORM\Column(name="term_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $termId;

    /**
     * @var string
     *
     * @ORM\Column(name="term", type="string", length=75, nullable=false)
     */
    private $term;

    /**
     * @var string
     *
     * @ORM\Column(name="stem", type="string", length=75, nullable=false)
     */
    private $stem;

    /**
     * @var bool
     *
     * @ORM\Column(name="common", type="boolean", nullable=false)
     */
    private $common = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="phrase", type="boolean", nullable=false)
     */
    private $phrase = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", precision=10, scale=0, nullable=false)
     */
    private $weight = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="soundex", type="string", length=75, nullable=false)
     */
    private $soundex;

    /**
     * @var int
     *
     * @ORM\Column(name="links", type="integer", nullable=false)
     */
    private $links = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private $language = '';


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
     * Set term.
     *
     * @param string $term
     *
     * @return JosFinderTerms
     */
    public function setTerm($term)
    {
        $this->term = $term;

        return $this;
    }

    /**
     * Get term.
     *
     * @return string
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * Set stem.
     *
     * @param string $stem
     *
     * @return JosFinderTerms
     */
    public function setStem($stem)
    {
        $this->stem = $stem;

        return $this;
    }

    /**
     * Get stem.
     *
     * @return string
     */
    public function getStem()
    {
        return $this->stem;
    }

    /**
     * Set common.
     *
     * @param bool $common
     *
     * @return JosFinderTerms
     */
    public function setCommon($common)
    {
        $this->common = $common;

        return $this;
    }

    /**
     * Get common.
     *
     * @return bool
     */
    public function getCommon()
    {
        return $this->common;
    }

    /**
     * Set phrase.
     *
     * @param bool $phrase
     *
     * @return JosFinderTerms
     */
    public function setPhrase($phrase)
    {
        $this->phrase = $phrase;

        return $this;
    }

    /**
     * Get phrase.
     *
     * @return bool
     */
    public function getPhrase()
    {
        return $this->phrase;
    }

    /**
     * Set weight.
     *
     * @param float $weight
     *
     * @return JosFinderTerms
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

    /**
     * Set soundex.
     *
     * @param string $soundex
     *
     * @return JosFinderTerms
     */
    public function setSoundex($soundex)
    {
        $this->soundex = $soundex;

        return $this;
    }

    /**
     * Get soundex.
     *
     * @return string
     */
    public function getSoundex()
    {
        return $this->soundex;
    }

    /**
     * Set links.
     *
     * @param int $links
     *
     * @return JosFinderTerms
     */
    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Get links.
     *
     * @return int
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return JosFinderTerms
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
