<?php
namespace webhook\Services\Webhooks;

use Illuminate\Http\Request;

/**
 * gihub处理push
 * @author flyspring
 *
 */
class Github implements WebhookInterface
{
    use Webhook;
    
    private $config;
    private $projects;

    public function __construct($config, $projects)
    {
        $this->config = $config;
        $this->projects = $projects;
    }
    
    /**
     * 核查请求是否正确
     * @see \webhook\Services\Webhooks\WebHookInterface::checkRequest()
     */
    public function checkRequest(Request $request)
    {
        return ($this->request->headers->has('X-GitHub-Event'));
    }
    
    /**
     * 处理push响应，返回project
     * @see \webhook\Services\Webhooks\WebHookInterface::handlePush()
     */
    public function handlePush(Request $request)
    {
        $input = $request->input();
        
        return false;
    }
}