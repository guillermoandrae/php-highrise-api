<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Common\CollectionInterface;
use Guillermoandrae\Highrise\Http\AdapterInterface;

interface ResourceInterface
{
    /**
     * Finds the resource associated with the provided ID.
     *
     * @param mixed $id The ID.
     * @return array
     */
    public function find($id): array;

    /**
     * Finds resources using the provided options.
     *
     * @param array $options The request options.
     * @return CollectionInterface
     */
    public function findAll(array $options = []): CollectionInterface;

    /**
     * Searches for resources using the provided options.
     *
     * @param array $options The search request options.
     * @return CollectionInterface
     */
    public function search(array $options = []): CollectionInterface;

    /**
     * Creates a new resource using the provided options.
     *
     * @param array $options The search request options.
     * @return array
     */
    public function create(array $options): array;

    /**
     * Updates a resource using the provided options.
     *
     * @param mixed $id The ID.
     * @param array $options The search request options.
     * @return array
     */
    public function update($id, array $options): array;

    /**
     * Deletes the resource associated with the provided ID.
     *
     * @param mixed $id The ID.
     * @return bool
     */
    public function delete($id): bool;

    /**
     * Returns the name used in the resource endpoint.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns the HTTP adapter.
     *
     * @return AdapterInterface
     */
    public function getAdapter(): AdapterInterface;
}
