<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\CommentsStoreRequest;
use App\Service\Comment\StoreGuest\Dto as CommentStoreDto;
use DomainException;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use App\Contracts\Comments\CommentsStoreGuestServiceContract as CommentsStoreGuestService;

class CommentsController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function storeGuest(CommentsStoreRequest $request, CommentsStoreGuestService $service)
    {
        try {
            $data = new CommentStoreDto($request->validated());
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
}
