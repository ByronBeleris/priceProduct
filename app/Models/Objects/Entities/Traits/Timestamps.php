<?php namespace App\Models\Objects\Entities\Traits;

use DateTime;

trait Timestamps
{

    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     * @var \DateTime
     */
    private $deletedAt;

    /**
     * Handles prePersisting
     *
     * @ORM\PrePersist
     * @return void
     * @throws \Exception
     */
    public function prePersist()
    {
        $now = new Datetime;
        $this->createdAt = $this->createdAt ?: $now;
        $this->updatedAt = $this->updatedAt ?: $now;
    }

    /**
     * Handles preUpdating
     *
     * @return void
     * @throws \Exception
     */
    public function preUpdate()
    {
        $this->updatedAt = new DateTime;
    }

    /**
     * Get CreatedAt timestamp
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets the createdAt
     *
     * @param DateTime $createdAt
     * @return void
     */
    public function setCreatedAt( DateTime $createdAt )
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Gets the updated timestamp
     *
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets the updatedAt timestamp
     *
     * @param DateTime $updatedAt
     * @return void
     */
    public function setUpdatedAt( DateTime $updatedAt )
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Gets the deleted timestamp
     *
     * @return DateTime
     */
    public function getDeletedAt() {
        return $this->deletedAt;
    }

    /**
     * Sets the deletedAt timestamp
     *
     * @param DateTime $deletedAt
     * @return void
     */
    public function setDeletedAt(DateTime $deletedAt) {
        $this->deletedAt = $deletedAt;
    }

    /**
     * Checks if entity is deleted
     *
     * @return bool
     * @throws \Exception
     */
    public function isDeleted() {
        return ($this->deletedAt) ? new DateTime > $this->deletedAt : false;
    }
}