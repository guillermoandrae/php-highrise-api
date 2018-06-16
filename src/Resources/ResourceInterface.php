<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Common\Collection;

interface ResourceInterface
{
    public function fetch($id);
    public function search(array $options = []): Collection;
    public function create(array $options): bool;
    public function update($id, array $options);
    public function delete($id): bool;
    public function getName(): string;
}
