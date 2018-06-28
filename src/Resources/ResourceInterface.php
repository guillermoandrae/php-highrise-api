<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Common\CollectionInterface;
use Guillermoandrae\Highrise\Entities\EntityInterface;
use Guillermoandrae\Highrise\Http\AdapterInterface;

interface ResourceInterface
{
    /**
     * Finds the resource associated with the provided ID.
     *
     * @param mixed $id  The ID.
     * @return EntityInterface
     */
    public function find($id): EntityInterface;

    /**
     * Finds resources using the provided filters.
     *
     * @param array $filters  The request filters.
     * @return CollectionInterface
     */
    public function findAll(array $filters = []): CollectionInterface;

    /**
     * Searches for resources using the provided criteria.
     *
     * @param array $criteria  The search criteria.
     * @return CollectionInterface
     */
    public function search(array $criteria = []): CollectionInterface;

    /**
     * Creates a new resource using the provided data.
     *
     * @param array $data  The data to use when creating a resource.
     * @return EntityInterface
     */
    public function create(array $data): EntityInterface;

    /**
     * Updates the resource associated with the provided ID using the provided
     * data.
     *
     * @param mixed $id  The ID.
     * @param array $data The data to use when updating a resource.
     * @return EntityInterface
     */
    public function update($id, array $data): EntityInterface;

    /**
     * Deletes the resource associated with the provided ID.
     *
     * @param mixed $id  The ID.
     * @return bool
     */
    public function delete($id): bool;

    /**
     * Returns the name to be used in the resource endpoint.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns the HTTP adapter registered with this object.
     *
     * @return AdapterInterface
     */
    public function getAdapter(): AdapterInterface;
}
