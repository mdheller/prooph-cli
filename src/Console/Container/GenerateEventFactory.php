<?php
/**
 * prooph (http://getprooph.org/)
 *
 * @see       https://github.com/proophsoftware/prooph-cli for the canonical source repository
 * @copyright Copyright (c) 2016 prooph software GmbH (http://prooph-software.com/)
 * @license   https://github.com/proophsoftware/prooph-cli/blob/master/LICENSE.md New BSD License
 */

namespace Prooph\Cli\Console\Container;

use Interop\Container\ContainerInterface;
use Prooph\Cli\Code\Generator\Event as EventGenerator;
use Prooph\Cli\Console\Command\GenerateEvent;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GenerateEventFactory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, '');
    }

    /**
     * @inheritdoc
     * @return GenerateEvent
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new GenerateEvent(
            $container->get(EventGenerator::class)
        );
    }
}
