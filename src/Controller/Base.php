<?php
namespace Pearler\Controller;

use Interop\Container\ContainerInterface;

class Base
{
    protected $c;
    protected $model;

    public function __construct(ContainerInterface $container)
    {
        $this->c = $container;
        $this->autoAssignModelName();
        $this->c[$this->model] = new $this->model($this->c);
    }

    private function autoAssignModelName()
    {
        if (!$this->model) {
            $this->model = str_replace('Controller', 'Model', get_class($this));
        }
        //$this->c['logger']->addInfo("mode=" . $this->model);
    }

    public function getModel()
    {
        return $this->model;
    }

    protected function fetchModelObject(array $args = array())
    {
        if (empty($args['model'])) {
            $args['model'] = $this->model;
        }

        $model = $this->c[$args['model']];

        return $model;
    }

    public function getRequestQueryParams( $request)
    {
        $params = $request->getQueryParams();
        $payload = $this->preparePayload($params);
        return $payload;
    }

    protected function preparePayload(array $payload)
    {
        foreach ($payload as $k => $item) {
            if (is_array($item)) {
                $decoded = $item;
            } else {
                $item = urldecode($item);
                $decoded = json_decode($item, true);
                if (json_last_error() == JSON_ERROR_NONE) {
                    $item = $decoded;
                }
            }
            if (is_null($item)) {
                unset($payload[$k]);
            } else {
                $payload[$k] = $item;
            }
        }
        return $payload;
    }

    protected function getListContent($request, $response, $args, $params)
    {
        $model = $this->fetchModelObject();
        $list = $model->getList($params);
        return $list;
    }

    public function index($request, $response, $args) {
        $params = $this->getRequestQueryParams($request);
        $data = $this->getListContent($request, $response, $args, $params);

        $this->c->view->setLayout("layout.php");
        $ret = $this->c->view->render($response, 'home.php', [
            'title' => "Event to Meet!!",
            'data' => $data
        ]);
        //$this->logger->addInfo($ret);
        return $ret;
    }

}