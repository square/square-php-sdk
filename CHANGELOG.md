# Change Log

## Version 9.0.0.20210226 (2021-02-26)
## Existing API updates

* **Customers API:**

  * [New webhooks](https://developer.squareup.com/docs/customers-api/use-the-api/customer-webhooks) (beta). Square now sends notifications for the following events:
     * [customer.created](https://developer.squareup.com/reference/square_2021-02-26/webhooks/customer.created)
     * [customer.deleted](https://developer.squareup.com/reference/square_2021-02-26/webhooks/customer.deleted)
     * [customer.updated](https://developer.squareup.com/reference/square_2021-02-26/webhooks/customer.updated)

* **Orders API:**
   * [CreateOrder](https://developer.squareup.com/reference/square_2021-02-26/orders-api/create-order). Removed the `location_id` field from the request. It was an unused field.

* **Payments API:**
   * [Payment](https://developer.squareup.com/reference/square_2021-02-26/objects/Payment). This type now returns the `card_payment_timeline` [(CardPaymentTimeline](https://developer.squareup.com/reference/square_2021-02-26/objects/CardPaymentTimeline)) as part of the `card_details` field.

* **v1 Items API:**
  * The following endpoints are [retired:](https://developer.squareup.com/docs/build-basics/api-lifecycle)
    * `AdjustInventory`: Use the Square Inventory API [BatchChangeInventory](https://developer.squareup.com/reference/square_2021-02-26/inventory-api/batch-change-inventory) endpoint.
    * `ListInventory`: Use the Square Inventory API  [BatchRetrieveInventoryCounts](https://developer.squareup.com/reference/square_2021-02-26/inventory-api/batch-retrieve-inventory-counts) endpoint.

* **v1 Employees.Timecards:**
  * The following endpoints are retired:
    * `CreateTimecard`: Use the Square Labor API [CreateShift](https://developer.squareup.com/reference/square_2021-02-26/labor-api/create-shift) endpoint.
    * `DeleteTimecard`: Use the Square Labor API [DeleteShift](https://developer.squareup.com/reference/square_2021-02-26/labor-api/delete-shift) endpoint.
    * `ListTimecards`: Use the Square Labor API [SearchShift](https://developer.squareup.com/reference/square_2021-02-26/labor-api/search-shift) endpoint.
    * `RetrieveTimecards`: Use the Square Labor API [GetShift](https://developer.squareup.com/reference/square_2021-02-26/labor-api/get-shift) endpoint.
    * `UpdateTimecard`: Use the Square Labor API [UpdateShift](https://developer.squareup.com/reference/square_2021-02-26/labor-api/update-shift) endpoint.
    * `ListTimecardEvents`: No direct replacement. To learn about replacing the v1 functionality, see the [migration guide.](https://developer.squareup.com/docs/migrate-from-v1/guides/v1-timecards#endpoints)

* **v1 Employees.CashDrawers:**
  * The following endpoints are retired:
    * `ListCashDrawerShifts`: Use the Square CashDrawerShifts API [ListCashDrawerShifts](https://developer.squareup.com/reference/square_2021-02-26/cash-drawers-api/list-cash-drawer-shifts) endpoint.
    * `RetrieveCashDrawerShift`: Use the Square CashDrawerShifts API [RetrieveCashDrawerShift](https://developer.squareup.com/reference/square_2021-02-26/cash-drawers-api/retrieve-cash-drawer-shift) endpoint.
* **v1 Transactions.BankAccounts:**
  * The following endpoints are retired:
    * `ListBankAccounts`: Use the Square Bank Accounts API [ListBankAccounts](https://developer.squareup.com/reference/square_2021-02-26/bank-accounts-api/list-bank-accounts) endpoint.
    * `RetrieveBankAccount`: Use the Square Bank Accounts API [GetBankAccount](https://developer.squareup.com/reference/square_2021-02-26/bank-accounts-api/get-bank-account) endpoint.

## SDKs

* **All Square SDKs:**

    By default, all SDKs send requests to Square's production (https://connect.squareup.com) or sandbox (https://connect.squareupsandbox.com) hosts based on the client's `environment` parameter.

    You now have the option to use a custom URL instead. To use a custom URL, follow the example for your language to set the `environment` parameter to `custom` and the `customUrl` parameter to your URL:

    - Java

      ```java
      new SquareClient.Builder()
        .environment(Environment.CUSTOM)
        .customUrl("https://example.com")
      ```

    - .NET

      ```csharp
      new Square.SquareClient.Builder()
        .Environment(Environment.Custom)
        .CustomUrl("https://example.com")
      ```

    - Node.js

      ```javascript
      new Client({
        environment: Environment.Custom,
        customUrl: 'https://example.com'
      });
      ```

    - PHP

      ```php
      new Square\SquareClient([
        'environment' => Environment::CUSTOM,
        'customUrl' => 'https://example.com',
      ]);
      ```

    - Python

      ```python
      Client(
        environment = 'custom',
        custom_url = 'https://example.com',)
      ```

    - Ruby

      ```ruby
      Square::Client.new(
        environment: 'custom',
        custom_url: 'https://example.com'
      });
      ```


* **Square .NET SDK:**

  Square has overridden the `Equals` and `GetHashCode` methods for models:

  * In the `Equals` override, Square has implemented a field-level comparison.
  * The Square `GetHashCode` override now ensures that hashes are deterministic and unique for each object.

* **Square Node.js SDK:**

  Endpoints that return 64-bit integers now return a `BigInt` object instead of a `Number` object.


* **Connect Node.js SDK:** (deprecated)

  The deprecated Connect Node.js SDK is in the security [maintenance state.](https://developer.squareup.com/docs/build-basics/api-lifecycle#maintenance) It does not receive any bug fixes or API updates from the Square version 2021-02-26 release. However, the SDK will receive support and security patches until it is retired (end of life) in the second quarter of 2021. For more information, including steps for migrating to the [Square Node.js SDK,](https://github.com/square/square-nodejs-sdk) see the [Connect SDK README.](https://github.com/square/connect-nodejs-sdk/blob/master/README.md)

## Documentation updates
* **Catalog API:**
  * [Update Catalog Objects.](https://developer.squareup.com/docs/catalog-api/update-catalog-objects) Provides programming guidance to update catalog objects.

* **Inventory API:**
  * [List or retrieve inventory.](https://developer.squareup.com/docs/migrate-from-v1/guides/v1-items#list-or-retrieve-inventory) Migrate the retired v1 endpoint of `ListInventory` to the v2 endpoint of `BatchRetrieveInventoryCounts`. Compare and contrast the programming patterns between the v1 endpoint of `ListInventory` and its v2 counterparts of [BatchRetrieveInventoryCounts](https://developer.squareup.com/reference/square_2021-02-26/inventory-api/batch-retrieve-inventory-counts) or [RetrieveInventoryCount](https://developer.squareup.com/reference/square_2021-02-26/inventory-api/retrieve-inventory-count).
  * [Adjust or change inventory.](https://developer.squareup.com/docs/migrate-from-v1/guides/v1-items#adjust-or-change-inventory) Migrate the retired v1 endpoint of `AdjustInventory` to the v2 endpoint of `BatchChangeInventory`. Compare and contrast the programming patterns between the v1 endpoint of `AdjustInventory` and its v2 counterparts of [BatchChangeInventory](https://developer.squareup.com/reference/square_2021-02-26/inventory-api/batch-change-inventory).

* **Get Started topic.** Revised the [Get Started](https://developer.squareup.com/docs/get-started) experience. In addition to clarifications, it now includes the use of the Square Sandbox and API Explorer. These are the tools and environments developers use to explore Square APIs.


## Version 8.1.0.20210121 (2021-01-21T00:00)
## Existing API updates

* **Invoices API:** (beta)

  The `InvoicePaymentRequest.request_method` field is deprecated, and its current options are separated into two new fields that better represent their scope:
  * `Invoice.delivery_method` specifies how Square should send invoices, reminders, and receipts to the customer.
  * `InvoicePaymentRequest.automatic_payment_source` specifies the payment method for an automatic payment.

  As part of this change, the [InvoiceDeliveryMethod](https://developer.squareup.com/reference/square_2021-01-21/enums/InvoiceDeliveryMethod) and [InvoiceAutomaticPaymentSource](https://developer.squareup.com/reference/square_2021-01-21/enums/InvoiceAutomaticPaymentSource) enums are added and the `InvoiceRequestMethod` enum is deprecated.

  The Invoices API will continue to accept `request_method` in create and update requests until the field is retired, but starting in this version, `request_method` is not included in returned `Invoice` objects. For more information, see the [migration notes.](https://developer.squareup.com/docs/invoices-api/overview#migrate-InvoicePaymentRequest.request_method)


* **Locations API:**
  * The [Locations.MCC](https://developer.squareup.com/reference/square_2021-01-21/objects/Location#definition__property-mcc) field is now updatable (beta). You can use the `UpdateLocation` endpoint to update the merchant category code (MCC) associated with a seller location. For more information, see [Initialize a merchant category code.](https://developer.squareup.com/docs/locations-api#initialize-a-merchant-category-code)




## SDKs
* **Connect Node.js SDK:** (deprecated)

  The deprecated Connect Node.js SDK is in the security [maintenance state.](https://developer.squareup.com/docs/build-basics/api-lifecycle#maintenance) It will not receive any bug fixes or API updates from the Square version 2021-01-21 release. However, the SDK will receive support and security patches until it is retired (EOL) in Q2, 2021. For more information, including steps for migrating to the [Square Node.js SDK,](https://github.com/square/square-nodejs-sdk) see the [Connect SDK README.](https://github.com/square/connect-nodejs-sdk/blob/master/README.md)

## Documentation updates
* **Catalog API:**
  * The [Use Item Options to Manage Item Variations](https://developer.squareup.com/docs/catalog-api/item-options-migration) topic is added. It demonstrates how item variations are usually used and how item options can be used to enable random access to item variations.

* **Inventory API:**
  * The [Inventory API](inventory-api/what-it-does) content is updated. It provides clearer guidance about how to use the API, with a task-oriented TOC and improved code examples.



## Version 8.0.0.20201216 (2020-12-16T00:00)
## Existing API updates

* **Orders API:**
  * [OrderLineItemPricingBlocklists.](https://developer.squareup.com/reference/square_2020-12-16/objects/OrderLineItemPricingBlocklists) You can explicitly specify taxes and discounts in an order or automatically apply preconfigured taxes and discounts to an order. In addition, you can now block applying these taxes and discounts to a specific [OrderLineItem](https://developer.squareup.com/reference/square_2020-12-16/objects/OrderLineItem) in an [order](https://developer.squareup.com/reference/square_2020-12-16/objects/Order). You add the `pricing_blocklists` attribute to individual line items and specify the `blocked_discounts` and `blocked_taxes` that you do not want to apply. For more information, see [Apply Taxes and Discounts.](https://developer.squareup.com/docs/orders-api/apply-taxes-and-discounts) For example walkthroughs, see [Automatically Apply Discounts](https://developer.squareup.com/docs/orders-api/apply-taxes-and-discounts/auto-apply-discounts) and [Automatically Apply Taxes.](https://developer.squareup.com/docs/orders-api/apply-taxes-and-discounts/auto-apply-taxes)
  * [OrderPricingOptions](https://developer.squareup.com/reference/square_2020-12-16/objects/OrderPricingOptions). Previously, the `pricing_options` field in an [order](https://developer.squareup.com/reference/square_2020-12-16/objects/OrderPricingOptions) supported only `auto_apply_discounts` to enable the automatic application of preconfigured discounts. Now it also supports `auto_apply_taxes` to enable the automatic application of preconfigured taxes. For more information, see [Automatically apply preconfigured catalog taxes or discounts.](https://developer.squareup.com/docs/orders-api/apply-taxes-and-discounts#automatically-apply-preconfigured-catalog-taxes-or-discounts)

  * [OrderLineItemTax](https://developer.squareup.com/reference/square_2020-12-16/objects/OrderLineItemTax). It now includes the new `auto_applied` field. It indicates whether the tax was automatically applied using a preconfigured [CatalogTax](https://developer.squareup.com/reference/square_2020-12-16/objects/CatalogTax).


* **Bookings API:**
  * The [CancelBooking](https://developer.squareup.com/reference/square_2020-12-16/bookings-api/cancel-booking) endpoint supports canceling an accepted or pending booking.
  * The [booking.created](https://developer.squareup.com/reference/square_2020-12-16/webhooks/booking.created) webhook event notifies when a new booking is created by calling the [CreateBooking](https://developer.squareup.com/reference/square_2020-12-16/bookings-api/cancel-booking) endpoint.
  * The [booking.updated](https://developer.squareup.com/reference/square_2020-12-16/webhooks/booking.updated) webhook event notifies when an existing booking is updated.

* **Catalog API:**
  * [ListCatalog](https://developer.squareup.com/reference/square_2020-12-16/catalog-api/list-catalog), [RetrieveCatalogObject](https://developer.squareup.com/reference/square_2020-12-16/catalog-api/retrieve-catalog-object), and [BatchRetrieveCatalogObjects](https://developer.squareup.com/reference/square_2020-12-16/catalog-api/batch-retrieve-catalog-objects) now support the `catalog_version` filter to return catalog objects of the specified version.

* **Customers API:**
  * [SearchCustomers](https://developer.squareup.com/reference/square_2020-12-16/customers-api/search-customers) endpoint. The `email_address`, `group_ids`, `phone_number`, and `reference_id` query filters are now generally available (GA).
  * The [Customer Groups](https://developer.squareup.com/reference/square_2020-12-16/customer-groups-api) API is now GA.
  * The [Customer Segments](https://developer.squareup.com/reference/square_2020-12-16/customer-segments-api) API is now GA.


* **Invoices API:** (beta)
  * [Invoice](https://developer.squareup.com/reference/square_2020-12-16/objects/Invoice) object. Added the  `custom_fields` field, which contains up to two customer-facing, seller-defined fields to display on the invoice. For more information, see [Custom fields.](https://developer.squareup.com/docs/invoices-api/overview#custom-fields)
    As part of this change, the following objects are added:
      * [InvoiceCustomField](https://developer.squareup.com/reference/square_2020-12-16/objects/InvoiceCustomField) object
      * [InvoiceCustomFieldPlacement](https://developer.squareup.com/reference/square_2020-12-16/enums/InvoiceCustomFieldPlacement) enum
  * [InvoiceRequestMethod](https://developer.squareup.com/reference/square_2020-12-16/enums/InvoiceRequestMethod) enum. Added the read-only CHARGE_BANK_ON_FILE value, which represents a bank transfer automatic payment method for a recurring invoice.


* **Loyalty API:** (beta)
  * [LoyaltyProgramRewardTier](https://developer.squareup.com/reference/square_2020-12-16/objects/LoyaltyProgramRewardTier) object. The `definition` field in this type is deprecated and replaced by the new `pricing_rule_reference` field. You can use `pricing_rule_reference` fields to retrieve catalog objects that define the discount details for the reward tier. For more information, see [Get discount details for a reward tier.](https://developer.squareup.com/docs/loyalty-api/overview#get-discount-details-for-a-reward-tier)
    As part of this change, the following APIs are deprecated:
      * [LoyaltyProgramRewardDefinition](https://developer.squareup.com/reference/square_2020-12-16/objects/LoyaltyProgramRewardDefinition) object
      * [LoyaltyProgramRewardDefinitionScope](https://developer.squareup.com/reference/square_2020-12-16/enums/LoyaltyProgramRewardDefinitionScope) enum
      * [LoyaltyProgramRewardDefinitionType](https://developer.squareup.com/reference/square_2020-12-16/enums/LoyaltyProgramRewardDefinitionType) enum

## New SDK release
* **Square Node.js SDK:**

  The new [Square Node.js SDK](https://github.com/square/square-nodejs-sdk) is now GA and replaces the deprecated Connect Node.js SDK. For migration information, see the [Connect SDK README.](https://github.com/square/connect-nodejs-sdk/blob/master/README.md)


## Documentation updates

* [Get Right-Sized Permissions with Down-Scoped OAuth Tokens.](https://developer.squareup.com/docs/oauth-api/cookbook/downscoped-access) This new OAuth API topic shows how to get an additional reduced-scope OAuth token with a 24-hour expiration by using the refresh token from the Square account authorization OAuth flow.


## Version 7.0.0.20201118 (2020-11-18T00:00)
## New API releases

* **Bookings API** (beta). This API enables you, as an application developer, to create applications to set up and manage bookings for appointments of fixed duration in which  selected staff members of a Square seller provide specified services in supported locations for particular customers.
  * For an overview, see [Manage Bookings for Square Sellers](https://developer.squareup.com/docs/bookings-api/what-it-is).
  * For technical reference, see [Bookings API](https://developer.squareup.com/reference/square_2020-11-18/bookings-api).

## Existing API updates

*  **Payments API:**
   *  [Payment.](https://developer.squareup.com/reference/square_2020-11-18/objects/Payment) The object now includes the `risk_evaluation` field to identify the Square-assigned risk level associated with the payment. Sellers can use this information to provide the goods and services or refund the payment.

## New SDK release
* **New Square Node.js SDK (beta)**

  The new [Square Node.js SDK](https://github.com/square/square-nodejs-sdk) is available in beta and will eventually replace the deprecated Connect Node.js SDK. For migration information, see the [Connect SDK README.](https://github.com/square/connect-nodejs-sdk/blob/master/README.md) The following topics are updated to use the new SDK:
   * [Walkthrough: Integrate Square Payments in a Website](https://developer.squareup.com/docs/payment-form/payment-form-walkthrough)
   * [Verify the Buyer When Using a Nonce for an Online Payment](https://developer.squareup.com/docs/payment-form/cookbook/verify-buyer-on-card-charge)
   * [Create a Gift Card Payment Endpoint](https://developer.squareup.com/docs/payment-form/gift-cards/part-2)


## Documentation Updates

* The **Testing** topics are moved from the end of the table of contents to the top, in the **Home** section under [Testing your App](https://developer.squareup.com/docs/testing-your-app).
* [Pay for orders.]](https://developer.squareup.com/docs/orders-api/pay-for-order) Topic revised to add clarity when to use Payments API and Orders API to pay for an order. The [Orders Integration]](https://developer.squareup.com/docs/payments-api/take-payments?preview=true#orders-integration) topic in Payments API simplified accordingly.


## Version 6.5.0.20201028 (2020-10-28T00:00)

## Existing API updates

* **Terminal API.** New endpoints to enable sellers in Canada refund Interac payments.
    *  New endpoints:

       * [CreateTerminalRefund](https://developer.squareup.com/reference/square_2020-10-28/terminal-api/create-terminal-refund)
        * [GetTerminalRefund](https://developer.squareup.com/reference/square_2020-10-28/terminal-api/get-terminal-refund)
       * [CancelTerminalRefund](https://developer.squareup.com/reference/square_2020-10-28/terminal-api/cancel-terminal-refund)
       * [SearchTerminalRefunds](https://developer.squareup.com/reference/square_2020-10-28/terminal-api/search-terminal-refunds)

  * New webhooks:
     * `terminal.refund.created`. Notification of a new Terminal refund request.
     * `terminal.refund.updated`. Notification that a Terminal refund request state is changed.

  * New topic [Refund Interac Payments.](https://developer.squareup.com/docs/terminal-api/square-terminal-refunds). Describes how to refund Interac payments.

*  **Loyalty API (beta):**
   *  [SearchLoyaltyAccounts.](https://developer.squareup.com/reference/square_2020-10-28/loyalty-api/search-loyalty-accounts) The endpoint supports a new query parameter to search by customer ID.

* **Locations API:**
  * [Location](https://developer.squareup.com/reference/square_2020-10-28/objects/Location) object. Has a new read-only field,[full_format_logo_url](https://developer.squareup.com/reference/square_2020-10-28/objects/Location#definition__property-full_format_logo_url), which provides URL of a full-format logo image for the location.
  * [Webhooks](https://developer.squareup.com/docs/webhooks-api/subscribe-to-events#locations) The Locations API now supports notifications for when a location is created and when a location is updated.

* **Orders API:**
  * [RetrieveOrder](https://developer.squareup.com/reference/square_2020-10-28/orders-api/retrieve-order), new endpoint. For more information, see the [Retrieve Orders](https://developer.squareup.com/docs/orders-api/manage-orders#retrieve-orders) overview.

* **Invoices API (beta):**
  * [Invoice](https://developer.squareup.com/reference/square_2020-10-28/objects/Invoice) object. The [payment_requests](https://developer.squareup.com/reference/square_2020-10-28/objects/Invoice#definition__property-payment_requests) field can now contain up to 13 payment requests, with a maximum of 12 `INSTALLMENT` request types. This is a service-level change that applies to all Square API versions. For more information, see [Payment requests.](https://developer.squareup.com/docs/invoices-api/overview#payment-requests)

## Version 6.4.0.20200923 (2020-09-23)
## Existing API updates
* Invoices API (beta)
  * [InvoiceStatus](https://developer.squareup.com/reference/square_2020-09-23/enums/InvoiceStatus) enum. Added the `PAYMENT_PENDING` value. Previously, the Invoices API returned a `PAID` or `PARTIALLY_PAID` status for invoices in a payment pending state. Now, the Invoices API returns a `PAYMENT_PENDING` status for all invoices in a payment pending state, including those previously returned as `PAID` or `PARTIALLY_PAID`.
* Payments API
  * [ListPayment](https://developer.squareup.com/reference/square_2020-09-23/payments-api/list-payments). The endpoint now supports the `limit` parameter.
* Refunds API
  * [ListPaymentRefunds](https://developer.squareup.com/reference/square_2020-09-23/refunds-api/list-payment-refunds). The endpoint now supports the `limit` parameter.
* [DeviceDetails](https://developer.squareup.com/reference/square_2020-09-23/objects/DeviceDetails#definition__property-device_installation_id). The object now includes the `device_installation_id` field.
## Documentation updates
* [Payment status.](https://developer.squareup.com/docs/payments-api/take-payments#payment-status) Added details about the `Payment.status` changes and how the status relates to the seller receiving the funds.
* [Refund status.](https://developer.squareup.com/docs/payments-api/refund-payments#refund-status) Added details about the `PaymentRefund.status` changes and how the status relates to the cardholder receiving the funds.
* [CreateRefund errors.](https://developer.squareup.com/docs/payments-api/error-codes#createrefund-errors) Added documentation for the `REFUND_DECLINED` error code.

## Version 6.3.0.20200826 (2020-08-26)
## Existing API updates
* Orders API
  * [Order](https://developer.squareup.com/reference/square_2020-08-26/objects/Order) object. The `total_tip_money` field is now GA.
  * [CreateOrder](https://developer.squareup.com/reference/square_2020-08-26/orders-api/create-order), [UpdateOrder](https://developer.squareup.com/reference/square_2020-08-26/orders-api/update-order), and [BatchRetrieveOrders](https://developer.squareup.com/reference/square_2020-08-26/orders-api/batch-retrieve-orders). These APIs now support merchant-scoped endpoints (for example, the `CreateOrder` endpoint `POST /v2/orders`). The location-scoped variants of these endpoints (for example, the `CreateOrder` endpoint `POST /v2/locations/{location_id}/orders`) continue to work, but these endpoints are now deprecated. You should use the merchant-scoped endpoints (you provide the location information in the request body).
* Labor API
	* [Migrate from Employees to Team Members.](https://developer.squareup.com/docs/labor-api/migrate-to-teams) The Employees API is now deprecated in this release. Accordingly, update references to the  `Shift.employee_id` field to the `Shift.team_member_id` field of the Labor API.
* v2 Employees API (deprecated)
	* [Migrate from the Square Employees API.](https://developer.squareup.com/docs/team/migrate-from-v2-employees) The v2 Employees API is now deprecated. This topic provides information to migrate to the Team API.
* v1 Employees API (deprecated)
	* [Migrate from the v1 Employees API.](https://developer.squareup.com/docs/migrate-from-v1/guides/v1-employees) The v1 Employees API is now deprecated. This topic provides information to migrate to the Team API.

## Documentation updates
* Point of Sale API
	* [Build on iOS.](https://developer.squareup.com/docs/pos-api/build-on-ios) Corrected the Swift example code in step 7.
* Team API
	* [Team API Overview.](https://developer.squareup.com/docs/team/overview) Documented the limitation related to creating a team member in the Square Sandbox.

## All SDKs

SDK technical reference documentation:

* Nulls in SDK documentation example code are replaced with example values.

## .NET SDK

Bug fixes:

* The `APIException.Errors` property was not set on instantiation. Behavior is now corrected to instantiate the class with an empty `Errors` list.

## Version 6.2.0.20200812 (2020-08-12)
## API releases
* Subscriptions API (beta):
  * For an overview, see [Square Subscriptions.](https://developer.squareup.com/docs/subscriptions/overview)
  * For technical reference, see [Subscriptions API.](https://developer.squareup.com/reference/square_2020-08-12/subscriptions-api)

## Existing API updates
* Catalog API
	* [CatalogSubscriptionPlan](https://developer.squareup.com/reference/square_2020-08-12/objects/CatalogSubscriptionPlan) (beta). This catalog type is added in support of the Subscriptions API. Subscription plans are stored as catalog object of the `SUBSCRIPTION_PLAN` type. For more information, see [Set Up and Manage a Subscription Plan.](https://developer.squareup.com/docs/subscriptions-api/setup-plan)

## SqPaymentForm SDK updates
* [SqPaymentForm.masterpassImageURL.](https://developer.squareup.com/docs/api/paymentform#masterpassimageurl) This function is updated to return a Secure Remote Commerce background image URL.

## Documentation updates
* Locations API
	* [About the main location.](https://developer.squareup.com/docs/locations-api#about-the-main-location) Added  clarifying information about the main location concept.
* OAuth API
	* [Migrate to the Square API OAuth Flow.](https://developer.squareup.com/docs/oauth-api/migrate-to-square-oauth-flow) Added a new topic to document migration from a v1 location-scoped OAuth access token to the Square seller-scoped OAuth access token.
* Payment Form SDK
  * Renamed the Add a Masterpass Button topic to [Add a Secure Remote Commerce Button.](https://developer.squareup.com/docs/payment-form/add-digital-wallets/masterpass) Updated the instructions to add a Secure Remote Commerce button to replace a legacy Masterpass button.
  * [Payment form technical reference.](https://developer.squareup.com/docs/api/paymentform) Updated the reference to show code examples for adding a Secure Remote Commerce button.

## Version 6.1.0.20200722 (2020-07-22)
## API releases

* Invoices API (beta):
  * For an overview, see [Manage Invoices Using the Invoices API](https://developer.squareup.com/docs/invoices-api/overview).
  * For technical reference, see [Invoices API](https://developer.squareup.com/reference/square_2020-07-22/invoices-api).

## Existing API updates

* Catalog API
	* [SearchCatalogItems](https://developer.squareup.com/reference/square_2020-07-22/catalog-api/search-catalog-items). You can now call the new search endpoint to [search for catalog items or item variations](https://developer.squareup.com/docs/catalog-api/search-catalog-items), with simplified programming experiences, using one or more of the supported query filters, including the custom attribute value filter.
* Locations API
  * [Locations API Overview](https://developer.squareup.com/docs/locations-api). Introduced the "main" location concept.
  * [RetrieveLocation](https://developer.squareup.com/reference/square_2020-07-22/locations-api/retrieve-location). You can now specify "main" as the location ID to retrieve the main location information.

* Merchants API
  * [RetrieveMerchant](https://developer.squareup.com/reference/square_2020-07-22/merchants-api/retrieve-merchant) and [ListMerchants](https://developer.squareup.com/reference/square_2020-07-22/merchants-api/retrieve-merchant). These endpoints now return a new field, `main_location_id`.

* Orders API
  * [PricingOptions](https://developer.squareup.com/reference/square_2020-07-22/objects/Order#definition__property-pricing_options). You can now enable the `auto_apply_discounts` of the options to have rule-based discounts automatically applied to an [Order](https://developer.squareup.com/reference/square_2020-07-22/objects/Order) that is pre-configured with a [pricing rule](https://developer.squareup.com/reference/square_2020-07-22/objects/CatalogPricingRule).

* [Inventory API](https://developer.squareup.com/reference/square_2020-07-22/inventory-api)
	* Replaced 500 error on max string length exceeded with a max length error message. Max length attribute added to string type fields.

* Terminal API (beta)
	* [TerminalCheckout](https://developer.squareup.com/reference/square_2020-07-22/objects/TerminalCheckout) object. The `TerminalCheckoutCancelReason` field is renamed to `ActionCancelReason`.

## Documentation updates

* Catalog API
	* [Search a catalog](https://developer.squareup.com/docs/catalog-api/search-catalog). New topics added to provide actionable guides to using the existing [SearchCatalogObjects](https://developer.squareup.com/reference/square_2020-07-22/catalog-api/search-catalog-objects) endpoint, in addition to the [SearchCatalogItems](https://developer.squareup.com/reference/square_2020-07-22/catalog-api/search-catalog-items) endpoints.

* Orders API
	* [Create Orders](https://developer.squareup.com/docs/orders-api/create-orders). Updated existing content with the new pricing option for the automatic application of rule-based discounts.


## Version 6.0.0.20200625 (2020-06-25)

## New API release
* Team API generally available (GA)
  * For an overview, see [Team API Overview](https://developer.squareup.com/docs/team/overview).
  * For technical reference, see [Team API](https://developer.squareup.com/reference/square_2020-06-25/team-api).

## Existing API updates
* Catalog API
  * [Pricing](https://developer.squareup.com/reference/square_2020-06-25/objects/CatalogPricingRule) is now GA. It allows an application to configure catalog item pricing rules for the specified discounts to apply automatically.
* Payments API
  * The [CardPaymentDetails](https://developer.squareup.com/reference/square_2020-06-25/objects/CardPaymentDetails) type now supports a new field, [refund_requires_card_presence](https://developer.squareup.com/reference/square_2020-06-25/objects/CardPaymentDetails#definition__property-refund_requires_card_presence). When set to true, the payment card must be physically present to refund a payment.

## Version 5.0.0.20200528 (2020-05-28)
## Square SDK - PHP
Square is excited to announce the public release of customized SDK for PHP

To align with other Square SDKs generated for SQUARE API version 2020-05-28, the initial version of this PHP SDK is 5.0.0.20200528
