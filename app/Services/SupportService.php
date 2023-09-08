<?php

namespace App\Services;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Enums\SupportStatus;
use App\Repositories\Contracts\PaginationInterface as ContractsPaginationInterface;
use App\Repositories\Contracts\SupportRepositoryInterface as ContractsSupportRepositoryInterface;
use App\Repositories\PaginationInterface;
use App\Repositories\SupportRepositoryInterface;
use App\View\Components\StatusSupport;
use stdClass;

class SupportService
{

    public function __construct(
        protected ContractsSupportRepositoryInterface $repository
    ) {}

    public function paginate(
        int $page = 1,
        int $totalPerPage = 15,
        string $filter = null
    ): ContractsPaginationInterface { 
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter,
        );

    }

    public function getAll(string $filter = null): array
    { 
        return $this->repository->getAll($filter);

    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }

    public function updateStatus(string $id, SupportStatus $status): void
    {
        $this->repository->updateStatus($id, $status);
    }
}