<?php
namespace webhook\Services\Webhooks;

use Illuminate\Http\Request;

interface WebhookInterface
{
    /**
     * 检查请求是否合法
     * @param Request $request
     */
    public function checkRequest(Request $request);
    
    /**
     * 处理push请求，将push的信息进行转化
     * @param Request $request
     */
    public function handlePush(Request $request);
    
}