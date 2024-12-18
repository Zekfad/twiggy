<?php
declare(strict_types=1);

namespace Twiggy;

define('YII_ENABLE_ERROR_HANDLER', false);
define('YII_ENABLE_EXCEPTION_HANDLER', false);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'getTwigMetadata.php';

[, $WORKSPACE_DIR] = $argv;

$VENDOR_PATH = $WORKSPACE_DIR . DIRECTORY_SEPARATOR . 'vendor';

require_once $WORKSPACE_DIR . '/bootstrap.php';

/** @var \craft\web\Application $app */
$app = require $VENDOR_PATH . '/craftcms/cms/bootstrap/web.php';

$view = $app->getView();
$twig = $view->getTwig();
$templateRoots = $view->getSiteTemplateRoots();

$twigMetadata = \Twiggy\Metadata\getTwigMetadata($twig, 'craft');
$twigMetadata['loader_paths'] = $view->getSiteTemplateRoots();

echo json_encode($twigMetadata, JSON_PRETTY_PRINT) . PHP_EOL;
