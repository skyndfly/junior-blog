<?php

namespace App\Service\Admin\Article\Update;

use App\Contracts\Admin\Article\UpdateServiceContract;
use App\Helpers\UploadImageHelper;
use App\Http\Requests\Admin\Article\UpdateRequest as ArticleUpdateRequest;
use App\Models\Article;
use App\Repository\Admin\ArticleRepository;
use App\Service\Admin\Article\Store\StoreDto as StoreDto;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UpdateService implements UpdateServiceContract
{
    private ArticleRepository $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws UnknownProperties
     */
    public function handle(Article $article, ArticleUpdateRequest $request): void
    {
        $data = new StoreDto(array_merge($request->validated(), [
            'mainImage' => UploadImageHelper::updateImage($request, 'articles', 'mainImage', $article->mainImage)
        ]));
        $model = Article::updateModel(
            $article,
            $data->title,
            $data->slug,
            $data->description,
            $data->shortDescription,
            $data->mainImage,
            $data->status,
            $data->categoryId
        );
        $this->repository->store($model);
    }
}
