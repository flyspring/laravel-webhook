<?php

namespace webhook\Http\Controllers;

use webhook\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;
use webhook\Services\Webhooks\WebhookInterface;
use webhook\Services\Webhooks\Project;
use webhook\Jobs\UpdateProject;

class WebhookController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Webhook Controller
    |--------------------------------------------------------------------------
    |
    */
    
    protected $request;
    protected $webhook;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WebhookInterface $webhook, Request $request)
    {
        $this->webhook = $webhook;
        $this->request = $request;
    }
    
    public function webhook()
    {
        if (!$this->webhook->checkRequest($this->request)) {
            return 'not allow';
        }
        
        $project = $this->webhook->handlePush($this->request);
        if ($project === false) {
            return 'fail';
        }
        
        //插入更新队列
        $this->dispatch((new UpdateProject($project))->onQueue('webhook-push'));
        
        return 'success';
    }
}
