<?php

namespace Square;

use Square\Mobile\MobileClient;
use Square\OAuth\OAuthClient;
use Square\V1Transactions\V1TransactionsClient;
use Square\ApplePay\ApplePayClient;
use Square\BankAccounts\BankAccountsClient;
use Square\Bookings\BookingsClient;
use Square\Cards\CardsClient;
use Square\Catalog\CatalogClient;
use Square\Customers\CustomersClient;
use Square\Devices\DevicesClient;
use Square\Disputes\DisputesClient;
use Square\Employees\EmployeesClient;
use Square\Events\EventsClient;
use Square\GiftCards\GiftCardsClient;
use Square\Inventory\InventoryClient;
use Square\Invoices\InvoicesClient;
use Square\Labor\LaborClient;
use Square\Locations\LocationsClient;
use Square\Loyalty\LoyaltyClient;
use Square\Merchants\MerchantsClient;
use Square\Checkout\CheckoutClient;
use Square\Orders\OrdersClient;
use Square\Payments\PaymentsClient;
use Square\Payouts\PayoutsClient;
use Square\Refunds\RefundsClient;
use Square\Sites\SitesClient;
use Square\Snippets\SnippetsClient;
use Square\Subscriptions\SubscriptionsClient;
use Square\TeamMembers\TeamMembersClient;
use Square\Team\TeamClient;
use Square\Terminal\TerminalClient;
use Square\Vendors\VendorsClient;
use Square\CashDrawers\CashDrawersClient;
use Square\Webhooks\WebhooksClient;
use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Exception;

class SquareClient
{
    /**
     * @var MobileClient $mobile
     */
    public MobileClient $mobile;

    /**
     * @var OAuthClient $oAuth
     */
    public OAuthClient $oAuth;

    /**
     * @var V1TransactionsClient $v1Transactions
     */
    public V1TransactionsClient $v1Transactions;

    /**
     * @var ApplePayClient $applePay
     */
    public ApplePayClient $applePay;

    /**
     * @var BankAccountsClient $bankAccounts
     */
    public BankAccountsClient $bankAccounts;

    /**
     * @var BookingsClient $bookings
     */
    public BookingsClient $bookings;

    /**
     * @var CardsClient $cards
     */
    public CardsClient $cards;

    /**
     * @var CatalogClient $catalog
     */
    public CatalogClient $catalog;

    /**
     * @var CustomersClient $customers
     */
    public CustomersClient $customers;

    /**
     * @var DevicesClient $devices
     */
    public DevicesClient $devices;

    /**
     * @var DisputesClient $disputes
     */
    public DisputesClient $disputes;

    /**
     * @var EmployeesClient $employees
     */
    public EmployeesClient $employees;

    /**
     * @var EventsClient $events
     */
    public EventsClient $events;

    /**
     * @var GiftCardsClient $giftCards
     */
    public GiftCardsClient $giftCards;

    /**
     * @var InventoryClient $inventory
     */
    public InventoryClient $inventory;

    /**
     * @var InvoicesClient $invoices
     */
    public InvoicesClient $invoices;

    /**
     * @var LaborClient $labor
     */
    public LaborClient $labor;

    /**
     * @var LocationsClient $locations
     */
    public LocationsClient $locations;

    /**
     * @var LoyaltyClient $loyalty
     */
    public LoyaltyClient $loyalty;

    /**
     * @var MerchantsClient $merchants
     */
    public MerchantsClient $merchants;

    /**
     * @var CheckoutClient $checkout
     */
    public CheckoutClient $checkout;

    /**
     * @var OrdersClient $orders
     */
    public OrdersClient $orders;

    /**
     * @var PaymentsClient $payments
     */
    public PaymentsClient $payments;

    /**
     * @var PayoutsClient $payouts
     */
    public PayoutsClient $payouts;

    /**
     * @var RefundsClient $refunds
     */
    public RefundsClient $refunds;

    /**
     * @var SitesClient $sites
     */
    public SitesClient $sites;

    /**
     * @var SnippetsClient $snippets
     */
    public SnippetsClient $snippets;

    /**
     * @var SubscriptionsClient $subscriptions
     */
    public SubscriptionsClient $subscriptions;

    /**
     * @var TeamMembersClient $teamMembers
     */
    public TeamMembersClient $teamMembers;

    /**
     * @var TeamClient $team
     */
    public TeamClient $team;

    /**
     * @var TerminalClient $terminal
     */
    public TerminalClient $terminal;

    /**
     * @var VendorsClient $vendors
     */
    public VendorsClient $vendors;

    /**
     * @var CashDrawersClient $cashDrawers
     */
    public CashDrawersClient $cashDrawers;

    /**
     * @var WebhooksClient $webhooks
     */
    public WebhooksClient $webhooks;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param ?string $token The token to use for authentication.
     * @param ?string $version
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        ?string $token = null,
        ?string $version = null,
        ?array $options = null,
    ) {
        $token ??= $this->getFromEnvOrThrow('SQUARE_TOKEN', 'Please pass in token or set the environment variable SQUARE_TOKEN.');
        $defaultHeaders = [
            'Authorization' => "Bearer $token",
            'Square-Version' => '2025-07-16',
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Square',
            'X-Fern-SDK-Version' => '43.0.1.20250716',
            'User-Agent' => 'square/square/43.0.1.20250716',
        ];
        if ($version != null) {
            $defaultHeaders['Square-Version'] = $version;
        }

        $this->options = $options ?? [];
        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->mobile = new MobileClient($this->client, $this->options);
        $this->oAuth = new OAuthClient($this->client, $this->options);
        $this->v1Transactions = new V1TransactionsClient($this->client, $this->options);
        $this->applePay = new ApplePayClient($this->client, $this->options);
        $this->bankAccounts = new BankAccountsClient($this->client, $this->options);
        $this->bookings = new BookingsClient($this->client, $this->options);
        $this->cards = new CardsClient($this->client, $this->options);
        $this->catalog = new CatalogClient($this->client, $this->options);
        $this->customers = new CustomersClient($this->client, $this->options);
        $this->devices = new DevicesClient($this->client, $this->options);
        $this->disputes = new DisputesClient($this->client, $this->options);
        $this->employees = new EmployeesClient($this->client, $this->options);
        $this->events = new EventsClient($this->client, $this->options);
        $this->giftCards = new GiftCardsClient($this->client, $this->options);
        $this->inventory = new InventoryClient($this->client, $this->options);
        $this->invoices = new InvoicesClient($this->client, $this->options);
        $this->labor = new LaborClient($this->client, $this->options);
        $this->locations = new LocationsClient($this->client, $this->options);
        $this->loyalty = new LoyaltyClient($this->client, $this->options);
        $this->merchants = new MerchantsClient($this->client, $this->options);
        $this->checkout = new CheckoutClient($this->client, $this->options);
        $this->orders = new OrdersClient($this->client, $this->options);
        $this->payments = new PaymentsClient($this->client, $this->options);
        $this->payouts = new PayoutsClient($this->client, $this->options);
        $this->refunds = new RefundsClient($this->client, $this->options);
        $this->sites = new SitesClient($this->client, $this->options);
        $this->snippets = new SnippetsClient($this->client, $this->options);
        $this->subscriptions = new SubscriptionsClient($this->client, $this->options);
        $this->teamMembers = new TeamMembersClient($this->client, $this->options);
        $this->team = new TeamClient($this->client, $this->options);
        $this->terminal = new TerminalClient($this->client, $this->options);
        $this->vendors = new VendorsClient($this->client, $this->options);
        $this->cashDrawers = new CashDrawersClient($this->client, $this->options);
        $this->webhooks = new WebhooksClient($this->client, $this->options);
    }

    /**
     * @param string $env
     * @param string $message
     * @return string
     */
    private function getFromEnvOrThrow(string $env, string $message): string
    {
        $value = getenv($env);
        return $value ? (string) $value : throw new Exception($message);
    }
}
