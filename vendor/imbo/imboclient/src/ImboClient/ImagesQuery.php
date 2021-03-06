<?php
/**
 * This file is part of the ImboClient package
 *
 * (c) Christer Edvartsen <cogo@starzinger.net>
 *
 * For the full copyright and license information, please view the LICENSE file that was
 * distributed with this source code.
 */

namespace ImboClient;

/**
 * Query object for the GetImages command
 *
 * @package Client
 * @author Christer Edvartsen <cogo@starzinger.net>
 */
class ImagesQuery {
    /**
     * The page to get
     *
     * @var int
     */
    private $page = 1;

    /**
     * Number of images to get
     *
     * @var int
     */
    private $limit = 20;

    /**
     * Return metadata or not
     *
     * @var boolean
     */
    private $metadata = false;

    /**
     * Unix timestamp to start fetching from
     *
     * @var int
     */
    private $from;

    /**
     * Unix timestamp to fetch until
     *
     * @var int
     */
    private $to;

    /**
     * List of fields to include in the response
     *
     * @var string[]
     */
    private $fields = array();

    /**
     * List of fields to sort by
     *
     * @var string[]
     */
    private $sort = array();

    /**
     * Filter on these ID's
     *
     * @var string[]
     */
    private $ids = array();

    /**
     * Filter on these checksums
     *
     * @var string[]
     */
    private $checksums = array();

    /**
     * Filter on these original checksums
     *
     * @var string[]
     */
    private $originalChecksums = array();

    /**
     * Set or get the page property
     *
     * @param int $page Give this a value to set the page property
     * @return int|self
     */
    public function page($page = null) {
        if ($page === null) {
            return $this->page;
        }

        $this->page = (int) $page;

        return $this;
    }

    /**
     * Set or get the limit property
     *
     * @param int $limit Give this a value to set the limit property
     * @return int|self
     */
    public function limit($limit = null) {
        if ($limit === null) {
            return $this->limit;
        }

        $this->limit = (int) $limit;

        return $this;
    }

    /**
     * Set or get the metadata flag
     *
     * @param boolean $metadata Give this a value to set the metadata flag
     * @return boolean|self
     */
    public function metadata($metadata = null) {
        if ($metadata === null) {
            return $this->metadata;
        }

        $this->metadata = (bool) $metadata;

        return $this;
    }

    /**
     * Set or get the from attribute
     *
     * @param int $from Give this a value to set the from property
     * @return int|self
     */
    public function from($from = null) {
        if ($from === null) {
            return $this->from;
        }

        $this->from = (int) $from;

        return $this;
    }

    /**
     * Set or get the to attribute
     *
     * @param int $to Give this a value to set the to property
     * @return int|self
     */
    public function to($to = null) {
        if ($to === null) {
            return $this->to;
        }

        $this->to = (int) $to;

        return $this;
    }

    /**
     * Set or get the fields attribute
     *
     * @param string[] $fields Give this a value to set the fields property
     * @return string[]|self
     */
    public function fields(array $fields = null) {
        if ($fields === null) {
            return $this->fields;
        }

        $this->fields = $fields;

        return $this;
    }

    /**
     * Set or get the sort attribute
     *
     * @param string[] $sort Give this a value to set the sort property
     * @return string[]|self
     */
    public function sort(array $sort = null) {
        if ($sort === null) {
            return $this->sort;
        }

        $this->sort = $sort;

        return $this;
    }

    /**
     * Set or get the ids attribute
     *
     * @param string[] $ids Give this a value to set the ids property
     * @return string[]|self
     */
    public function ids(array $ids = null) {
        if ($ids === null) {
            return $this->ids;
        }

        $this->ids = $ids;

        return $this;
    }

    /**
     * Set or get the checksums attribute
     *
     * @param string[] $checksums Give this a value to set the checksums property
     * @return string[]|self
     */
    public function checksums(array $checksums = null) {
        if ($checksums === null) {
            return $this->checksums;
        }

        $this->checksums = $checksums;

        return $this;
    }

    /**
     * Set or get the originalChecksums attribute
     *
     * @param string[] $checksums Give this a value to set the originalChecksums property
     * @return string[]|self
     */
    public function originalChecksums(array $checksums = null) {
        if ($checksums === null) {
            return $this->originalChecksums;
        }

        $this->originalChecksums = $checksums;

        return $this;
    }
}
