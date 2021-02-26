<?php

declare(strict_types=1);

namespace Square;

use Square\Apis;

/**
 * Square client class
 */
class SquareClient implements ConfigurationInterface
{
    private $mobileAuthorization;
    private $oAuth;
    private $v1Employees;
    private $v1Transactions;
    private $applePay;
    private $bankAccounts;
    private $bookings;
    private $cashDrawers;
    private $catalog;
    private $customers;
    private $customerGroups;
    private $customerSegments;
    private $devices;
    private $disputes;
    private $employees;
    private $inventory;
    private $invoices;
    private $labor;
    private $locations;
    private $checkout;
    private $transactions;
    private $loyalty;
    private $merchants;
    private $orders;
    private $payments;
    private $refunds;
    private $subscriptions;
    private $team;
    private $terminal;

    private $timeout = ConfigurationDefaults::TIMEOUT;
    private $squareVersion = ConfigurationDefaults::SQUARE_VERSION;
    private $accessToken = ConfigurationDefaults::ACCESS_TOKEN;
    private $additionalHeaders = ConfigurationDefaults::ADDITIONAL_HEADERS;
    private $environment = ConfigurationDefaults::ENVIRONMENT;
    private $customUrl = ConfigurationDefaults::CUSTOM_URL;

    public function __construct(array $configOptions = null)
    {
        if (isset($configOptions['timeout'])) {
            $this->timeout = $configOptions['timeout'];
        }
        if (isset($configOptions['squareVersion'])) {
            $this->squareVersion = $configOptions['squareVersion'];
        }
        if (isset($configOptions['accessToken'])) {
            $this->accessToken = $configOptions['accessToken'];
        }
        if (isset($configOptions['additionalHeaders'])) {
            $this->additionalHeaders = $configOptions['additionalHeaders'];
            \Square\ApiHelper::assertHeaders($this->additionalHeaders);
        }
        if (isset($configOptions['environment'])) {
            $this->environment = $configOptions['environment'];
        }
        if (isset($configOptions['customUrl'])) {
            $this->customUrl = $configOptions['customUrl'];
        }
    }

    /**
     * Get the client configuration as an associative array
     */
    public function getConfiguration(): array
    {
        $configMap = [];

        if (isset($this->timeout)) {
            $configMap['timeout'] = $this->timeout;
        }
        if (isset($this->squareVersion)) {
            $configMap['squareVersion'] = $this->squareVersion;
        }
        if (isset($this->accessToken)) {
            $configMap['accessToken'] = $this->accessToken;
        }
        if (isset($this->additionalHeaders)) {
            $configMap['additionalHeaders'] = $this->additionalHeaders;
        }
        if (isset($this->environment)) {
            $configMap['environment'] = $this->environment;
        }
        if (isset($this->customUrl)) {
            $configMap['customUrl'] = $this->customUrl;
        }

        return $configMap;
    }

    /**
     * Clone this client and override given configuration options
     */
    public function withConfiguration(array $configOptions): self
    {
        return new self(\array_merge($this->getConfiguration(), $configOptions));
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }

    public function getSquareVersion(): string
    {
        return $this->squareVersion;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getAdditionalHeaders(): array
    {
        return $this->additionalHeaders;
    }

    public function getEnvironment(): string
    {
        return $this->environment;
    }

    public function getCustomUrl(): string
    {
        return $this->customUrl;
    }

    /**
     * Get current SDK version
     */
    public function getSdkVersion(): string
    {
        return '9.0.0.20210226';
    }

    /**
     * Get the base uri for a given server in the current environment
     *
     * @param  string $server Server name
     *
     * @return string         Base URI
     */
    public function getBaseUri(string $server = Server::DEFAULT_): string
    {
        return ApiHelper::appendUrlWithTemplateParameters(
            static::ENVIRONMENT_MAP[$this->environment][$server],
            [
                'custom_url' => $this->customUrl,
            ],
            false
        );
    }

    /**
     * Returns Mobile Authorization Api
     */
    public function getMobileAuthorizationApi(): Apis\MobileAuthorizationApi
    {
        if ($this->mobileAuthorization == null) {
            $this->mobileAuthorization = new Apis\MobileAuthorizationApi($this);
        }
        return $this->mobileAuthorization;
    }

    /**
     * Returns O Auth Api
     */
    public function getOAuthApi(): Apis\OAuthApi
    {
        if ($this->oAuth == null) {
            $this->oAuth = new Apis\OAuthApi($this);
        }
        return $this->oAuth;
    }

    /**
     * Returns V1 Employees Api
     */
    public function getV1EmployeesApi(): Apis\V1EmployeesApi
    {
        if ($this->v1Employees == null) {
            $this->v1Employees = new Apis\V1EmployeesApi($this);
        }
        return $this->v1Employees;
    }

    /**
     * Returns V1 Transactions Api
     */
    public function getV1TransactionsApi(): Apis\V1TransactionsApi
    {
        if ($this->v1Transactions == null) {
            $this->v1Transactions = new Apis\V1TransactionsApi($this);
        }
        return $this->v1Transactions;
    }

    /**
     * Returns Apple Pay Api
     */
    public function getApplePayApi(): Apis\ApplePayApi
    {
        if ($this->applePay == null) {
            $this->applePay = new Apis\ApplePayApi($this);
        }
        return $this->applePay;
    }

    /**
     * Returns Bank Accounts Api
     */
    public function getBankAccountsApi(): Apis\BankAccountsApi
    {
        if ($this->bankAccounts == null) {
            $this->bankAccounts = new Apis\BankAccountsApi($this);
        }
        return $this->bankAccounts;
    }

    /**
     * Returns Bookings Api
     */
    public function getBookingsApi(): Apis\BookingsApi
    {
        if ($this->bookings == null) {
            $this->bookings = new Apis\BookingsApi($this);
        }
        return $this->bookings;
    }

    /**
     * Returns Cash Drawers Api
     */
    public function getCashDrawersApi(): Apis\CashDrawersApi
    {
        if ($this->cashDrawers == null) {
            $this->cashDrawers = new Apis\CashDrawersApi($this);
        }
        return $this->cashDrawers;
    }

    /**
     * Returns Catalog Api
     */
    public function getCatalogApi(): Apis\CatalogApi
    {
        if ($this->catalog == null) {
            $this->catalog = new Apis\CatalogApi($this);
        }
        return $this->catalog;
    }

    /**
     * Returns Customers Api
     */
    public function getCustomersApi(): Apis\CustomersApi
    {
        if ($this->customers == null) {
            $this->customers = new Apis\CustomersApi($this);
        }
        return $this->customers;
    }

    /**
     * Returns Customer Groups Api
     */
    public function getCustomerGroupsApi(): Apis\CustomerGroupsApi
    {
        if ($this->customerGroups == null) {
            $this->customerGroups = new Apis\CustomerGroupsApi($this);
        }
        return $this->customerGroups;
    }

    /**
     * Returns Customer Segments Api
     */
    public function getCustomerSegmentsApi(): Apis\CustomerSegmentsApi
    {
        if ($this->customerSegments == null) {
            $this->customerSegments = new Apis\CustomerSegmentsApi($this);
        }
        return $this->customerSegments;
    }

    /**
     * Returns Devices Api
     */
    public function getDevicesApi(): Apis\DevicesApi
    {
        if ($this->devices == null) {
            $this->devices = new Apis\DevicesApi($this);
        }
        return $this->devices;
    }

    /**
     * Returns Disputes Api
     */
    public function getDisputesApi(): Apis\DisputesApi
    {
        if ($this->disputes == null) {
            $this->disputes = new Apis\DisputesApi($this);
        }
        return $this->disputes;
    }

    /**
     * Returns Employees Api
     */
    public function getEmployeesApi(): Apis\EmployeesApi
    {
        if ($this->employees == null) {
            $this->employees = new Apis\EmployeesApi($this);
        }
        return $this->employees;
    }

    /**
     * Returns Inventory Api
     */
    public function getInventoryApi(): Apis\InventoryApi
    {
        if ($this->inventory == null) {
            $this->inventory = new Apis\InventoryApi($this);
        }
        return $this->inventory;
    }

    /**
     * Returns Invoices Api
     */
    public function getInvoicesApi(): Apis\InvoicesApi
    {
        if ($this->invoices == null) {
            $this->invoices = new Apis\InvoicesApi($this);
        }
        return $this->invoices;
    }

    /**
     * Returns Labor Api
     */
    public function getLaborApi(): Apis\LaborApi
    {
        if ($this->labor == null) {
            $this->labor = new Apis\LaborApi($this);
        }
        return $this->labor;
    }

    /**
     * Returns Locations Api
     */
    public function getLocationsApi(): Apis\LocationsApi
    {
        if ($this->locations == null) {
            $this->locations = new Apis\LocationsApi($this);
        }
        return $this->locations;
    }

    /**
     * Returns Checkout Api
     */
    public function getCheckoutApi(): Apis\CheckoutApi
    {
        if ($this->checkout == null) {
            $this->checkout = new Apis\CheckoutApi($this);
        }
        return $this->checkout;
    }

    /**
     * Returns Transactions Api
     */
    public function getTransactionsApi(): Apis\TransactionsApi
    {
        if ($this->transactions == null) {
            $this->transactions = new Apis\TransactionsApi($this);
        }
        return $this->transactions;
    }

    /**
     * Returns Loyalty Api
     */
    public function getLoyaltyApi(): Apis\LoyaltyApi
    {
        if ($this->loyalty == null) {
            $this->loyalty = new Apis\LoyaltyApi($this);
        }
        return $this->loyalty;
    }

    /**
     * Returns Merchants Api
     */
    public function getMerchantsApi(): Apis\MerchantsApi
    {
        if ($this->merchants == null) {
            $this->merchants = new Apis\MerchantsApi($this);
        }
        return $this->merchants;
    }

    /**
     * Returns Orders Api
     */
    public function getOrdersApi(): Apis\OrdersApi
    {
        if ($this->orders == null) {
            $this->orders = new Apis\OrdersApi($this);
        }
        return $this->orders;
    }

    /**
     * Returns Payments Api
     */
    public function getPaymentsApi(): Apis\PaymentsApi
    {
        if ($this->payments == null) {
            $this->payments = new Apis\PaymentsApi($this);
        }
        return $this->payments;
    }

    /**
     * Returns Refunds Api
     */
    public function getRefundsApi(): Apis\RefundsApi
    {
        if ($this->refunds == null) {
            $this->refunds = new Apis\RefundsApi($this);
        }
        return $this->refunds;
    }

    /**
     * Returns Subscriptions Api
     */
    public function getSubscriptionsApi(): Apis\SubscriptionsApi
    {
        if ($this->subscriptions == null) {
            $this->subscriptions = new Apis\SubscriptionsApi($this);
        }
        return $this->subscriptions;
    }

    /**
     * Returns Team Api
     */
    public function getTeamApi(): Apis\TeamApi
    {
        if ($this->team == null) {
            $this->team = new Apis\TeamApi($this);
        }
        return $this->team;
    }

    /**
     * Returns Terminal Api
     */
    public function getTerminalApi(): Apis\TerminalApi
    {
        if ($this->terminal == null) {
            $this->terminal = new Apis\TerminalApi($this);
        }
        return $this->terminal;
    }

    /**
     * A map of all baseurls used in different environments and servers
     *
     * @var array
     */
    private const ENVIRONMENT_MAP = [
        Environment::PRODUCTION => [
            Server::DEFAULT_ => 'https://connect.squareup.com',
        ],
        Environment::SANDBOX => [
            Server::DEFAULT_ => 'https://connect.squareupsandbox.com',
        ],
        Environment::CUSTOM => [
            Server::DEFAULT_ => '{custom_url}',
        ],
    ];
}
