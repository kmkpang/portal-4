<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosUserUsergroupMap
 *
 * @ORM\Table(name="jos_user_usergroup_map")
 * @ORM\Entity
 */
class JosUserUsergroupMap
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="Foreign Key to #__users.id"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $userId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="group_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="Foreign Key to #__usergroups.id"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $groupId = '0';


    /**
     * Set userId.
     *
     * @param int $userId
     *
     * @return JosUserUsergroupMap
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set groupId.
     *
     * @param int $groupId
     *
     * @return JosUserUsergroupMap
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Get groupId.
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }
}
