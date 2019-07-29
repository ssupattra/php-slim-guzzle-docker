<?php
namespace Pearler;

class App extends \Slim\App
{
    /**
     * @var ContainerInterface
     */
    protected $c;

    public function __construct()
    {
        parent::__construct([
            'settings' => [
                'displayErrorDetails' => constant('DEBUG_MODE'),
                'routerCacheFile' => $this->getRouterCacheFile(),
                'renderer'               => [
                    'template_path' => constant('TEMPLATE_DIR'),
                ]
            ]
        ]);

        $this->c = $this->getContainer();

        $this->c['view'] = function () {
            return new \Slim\Views\PhpRenderer($this->c->get('settings')['renderer']['template_path']);
        };
        $this->c['logger'] = function() {
            return $this->setLogger(constant('APP_NAME'), constant('LOG_FILE'));
        };

        $this->c['client'] = function() {
            return new \GuzzleHttp\Client();
        };

        $this->c['logger']->addInfo('Starting..logging');
    }

    protected function getRouterCacheFile()
    {
        return false;
    }

    public function setLogger($name, $log_file)
    {
        $logger = new \Monolog\Logger($name);
        $file_handler = new \Monolog\Handler\StreamHandler($log_file);
        $logger->pushHandler($file_handler);
        return $logger;
    }

    public function getLogger() {
        return $this->c['logger'];
    }
}