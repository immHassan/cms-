<?php

namespace App\Traits;

trait GlobalSearchable
{
    /**
     * @return array
     */
    public function getSearchQuery(): array
    {
        return $this->searchQuery;
    }

    /**
     * @param array $search
     */
    public function getSearch(array $search): void
    {
        $this->search = $search;
    }

    /**
     * @param array $only
     */
    public function getOnly(array $only): void
    {
        $this->only = $only;
    }

    /**
     * @param array $order
     */
    public function getOrder(array $order): void
    {
        $this->order = $order;
    }

    /**
     * @return array
     */
    public function searchableColumns()
    {
        return empty($this->search)
        ? [$this->getKeyName()]
        : $this->search;
    }

    /**
     * @return array
     */
    public function orderableColumns()
    {
        return empty($this->order)
            ? [$this->getKeyName()]
            : $this->order;
    }

    /**
     * @return array
     */
    public function filterColumns()
    {
        return empty($this->only)
            ? []
            : $this->only;
    }

    /**
     * @return array
     */
    public function getUrl()
    {
        return empty($this->url)
            ? []
            : $this->url;
    }

    /**
     * @return mixed
     */
    public function getSearchIndex()
    {
        return empty($this->searchIndex)
            ? $this->getTable()
            : $this->searchIndex;
    }

    /**
     * @return array
     */
    public function getAdditionalWhereClauses()
    {
        return empty($this->searchQuery)
            ? []
            : $this->searchQuery;
    }
}
