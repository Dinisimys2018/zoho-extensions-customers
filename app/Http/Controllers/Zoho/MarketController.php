<?php

namespace App\Http\Controllers\Zoho;

use App\Components\RestApi\Response\JsonResponse;
use App\Components\Zoho\Market\Requests\ActionRequestDTO;
use App\Components\Zoho\Market\Services\ExtensionService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MarketController extends Controller
{
    public function __construct(
        private JsonResponse $response,
        private ExtensionService $extensionService,
        private ActionRequestDTO $actionRequest
    )
    {
    }

    public function install()
    {
        $this->extensionService->install($this->actionRequest);
        return $this->response->emptySuccess();
    }

    public function uninstall()
    {
        $this->extensionService->uninstall($this->actionRequest);
        return $this->response->emptySuccess();
    }

    public function purchase()
    {
        $this->extensionService->purchase($this->actionRequest);
        return $this->response->emptySuccess();
    }

    public function downgrade()
    {
        $this->extensionService->downgrade($this->actionRequest);
        return $this->response->emptySuccess();
    }
}
