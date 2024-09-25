<?php

namespace App\Service\Comment;

use App\Contracts\Comments\CommentsGetAllByArticleServiceContract;
use App\Helpers\DateFormaterHelper;
use App\Repository\Comments\GetAllByArticle\Query as GetAllByArticleRepository;
use Illuminate\Pagination\LengthAwarePaginator;

final class CommentsGetAllByArticleService implements CommentsGetAllByArticleServiceContract
{
    private GetAllByArticleRepository $getAllByArticleRepository;
    public function __construct(GetAllByArticleRepository $query)
    {
        $this->getAllByArticleRepository = $query;
    }
    public function execute(int $articleId): LengthAwarePaginator
    {

        $comments = $this->getAllByArticleRepository->fetch($articleId);

        $comments->getCollection()->transform(function ($comment) {
            return [
                'id' => $comment->id,
                'name' => $comment->user->name,
                'comment' => $comment->comment,
                'created_at' => DateFormaterHelper::formatToDateTime($comment->created_at),
            ];
        });
        return $comments;
    }


}
