<?php
/**
 * PowerWechat
 * @author amoydavid
 * Date: 2019/1/7
 * Time: 2:38 PM
 */

namespace PowerWeChat\BasicService\ContentSecurity;


use PowerWeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author tianyong90 <412039588@qq.com>
 */
class Client extends BaseClient
{
    /**
     * @var string
     */
    protected $baseUri = 'https://api.weixin.qq.com/wxa/';

    /**
     * Text content security check.
     *
     * @param string $text
     *
     * @return array|\PowerWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \PowerWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function checkText(string $text)
    {
        $params = [
            'content' => $text,
        ];

        return $this->httpPostJson('msg_sec_check', $params);
    }

    /**
     * Image security check.
     *
     * @param string $path
     *
     * @return array|\PowerWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \PowerWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function checkImage(string $path)
    {
        return $this->httpUpload('img_sec_check', ['media' => $path]);
    }
}