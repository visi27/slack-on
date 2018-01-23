<?php
/**
 * Created by Evis Bregu <evis.bregu@gmail.com>.
 * Date: 1/23/18
 * Time: 10:56 AM
 */

namespace AppBundle\Service;


use CodeCloud\Bundle\ShopifyBundle\Model\ShopifyStoreInterface;
use CodeCloud\Bundle\ShopifyBundle\Model\ShopifyStoreManagerInterface;
use Psr\Log\LoggerInterface;

class StoreManagerService implements ShopifyStoreManagerInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param string $storeName
     *
     * @return ShopifyStoreInterface
     */
    public function findStoreByName($storeName)
    {
        // TODO: Implement findStoreByName() method.
    }

    /**
     * @param string $storeName
     * @param string $accessToken
     */
    public function authenticateStore($storeName, $accessToken)
    {
        $this->logger->info(sprintf("Authenticated '%s' and got access token '%s'", $storeName, $accessToken));
        // TODO: Implement authenticateStore() method.
    }
}