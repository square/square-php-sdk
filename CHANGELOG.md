# Change Log

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
  * [Webhooks.](https://developer.squareup.com/docs/webhooks-api/subscribe-to-events#locations) The Locations API now supports notifications for when a location is created and when a location is updated.

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
