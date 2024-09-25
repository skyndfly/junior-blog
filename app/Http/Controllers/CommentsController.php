<?php

namespace App\Http\Controllers;

use App\Contracts\Comments\CommentsGetAllByArticleServiceContract as CommentsGetAllByArticleService;
use App\Contracts\Comments\CommentsStoreAuthServiceContract as CommentsStoreAuthService;
use App\Contracts\Comments\CommentsStoreGuestServiceContract as CommentsStoreGuestService;
use App\Http\Requests\Comments\CommentsAuthStoreRequest;
use App\Http\Requests\Comments\CommentsGuestStoreRequest;
use App\Service\Comment\Dto\CommentStoreAuthServiceDto as CommentsStoreAuthDto;
use App\Service\Comment\Dto\CommentStoreGuestDto as CommentStoreGuestDto;
use DomainException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CommentsController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function storeGuest(CommentsGuestStoreRequest $request, CommentsStoreGuestService $service): RedirectResponse
    {
        try {
            $data = new CommentStoreGuestDto($request->validated());
            $service->handle($data);
            $request->session()->flash('success', 'Комментарий отправлен.');
        } catch (DomainException|UnknownProperties $e) {
            $uuid = Uuid::uuid4();
            $message = "{$e->getMessage()}. Error code - {$uuid}";
            $logMessage = "Class: " . __METHOD__ . " | Line: " . __LINE__ . " | " . $message;
            $request->session()->flash('error', "Ошибка. Обратитесь к администрации сайта, указав код - {$uuid}");
            Log::error($logMessage);
        }
        return redirect()->to(url()->previous() . "#comments");
    }

    public function storeAuth(CommentsAuthStoreRequest $request, CommentsStoreAuthService $service): JsonResponse
    {
        try {
            $data = new CommentsStoreAuthDto($request->validated());

            $service->handle($data);

            return response()->json(['message' => "Комментарий добавлен."], 200);
        } catch (HttpResponseException|UnknownProperties $e) {
            $uuid = Uuid::uuid4();
            $message = "{$e->getMessage()}. Error code - {$uuid}";
            $logMessage = "Class: " . __METHOD__ . " | Line: " . __LINE__ . " | " . $message;
            Log::error($logMessage);
            return response()->json(['message' => "Ошибка. Обратитесь к администрации сайта, указав код - {$uuid}."], 400);
        }
    }

    /**
     * @throws UnknownProperties
     */
    public function getByArticle(int $articleId, CommentsGetAllByArticleService $service): JsonResponse
    {

        return response()->json($service->execute($articleId));
    }
}
