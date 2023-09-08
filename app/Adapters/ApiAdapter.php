<?php

namespace App\Adapters;

use App\Http\Resources\DefaultResource;
use App\Repositories\Contracts\PaginationInterface as ContractsPaginationInterface;
use App\Repositories\PaginationInterface;

class ApiAdapter
{
    public static function toJson(ContractsPaginationInterface $data)
    {
        return DefaultResource::collection($data->items())
                                ->additional([
                                    'meta' => [
                                        'total' => $data->total(),
                                        'is_first_page' => $data->isFirstPage(),
                                        'is_first_page' => $data->isFirstPage(),
                                        'current_page' => $data->currentPage(),
                                        'next_page' => $data->getNumberNextPage(),
                                        'previous_page' => $data->getNumberPreviousPage(),
                                    ]
                                ]);
    }
}