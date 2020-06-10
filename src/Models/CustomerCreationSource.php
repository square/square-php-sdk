<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Indicates the method used to create the customer profile.
 */
class CustomerCreationSource
{
    /**
     * Default creation source. Typically used for backward/future
     * compatibility when the original source of a customer profile is
     * unrecognized. For example, when older clients do not support newer
     * source types.
     */
    public const OTHER = 'OTHER';

    /**
     * Customer profile created automatically when an appointment
     * was scheduled.
     */
    public const APPOINTMENTS = 'APPOINTMENTS';

    /**
     * Customer profile created automatically when a coupon was issued
     * using Square Point of Sale.
     */
    public const COUPON = 'COUPON';

    /**
     * Customer profile restored through Square's deletion recovery
     * process.
     */
    public const DELETION_RECOVERY = 'DELETION_RECOVERY';

    /**
     * Customer profile created manually through Square Dashboard or
     * Point of Sale application.
     */
    public const DIRECTORY = 'DIRECTORY';

    /**
     * Customer profile created automatically when a gift card was
     * issued using Square Point of Sale. Customer profiles are created for
     * both the purchaser and the recipient of the gift card.
     */
    public const EGIFTING = 'EGIFTING';

    /**
     * Customer profile created through Square Point of Sale when
     * signing up for marketing emails during checkout.
     */
    public const EMAIL_COLLECTION = 'EMAIL_COLLECTION';

    /**
     * Customer profile created automatically when providing feedback
     * through a digital receipt.
     */
    public const FEEDBACK = 'FEEDBACK';

    /**
     * Customer profile created automatically when importing customer
     * data through Square Dashboard.
     */
    public const IMPORT = 'IMPORT';

    /**
     * Customer profile created automatically during an invoice payment.
     */
    public const INVOICES = 'INVOICES';

    /**
     * Customer profile created automatically when customers provide a
     * phone number for loyalty reward programs during checkout.
     */
    public const LOYALTY = 'LOYALTY';

    /**
     * Customer profile created as the result of a campaign managed
     * through Square’s Facebook integration.
     */
    public const MARKETING = 'MARKETING';

    /**
     * Customer profile created as the result of explicitly merging
     * multiple customer profiles through the Square Dashboard or Point of
     * Sale application.
     */
    public const MERGE = 'MERGE';

    /**
     * Customer profile created through Square's Online Store solution
     * (legacy service).
     */
    public const ONLINE_STORE = 'ONLINE_STORE';

    /**
     * Customer profile created automatically as the result of a successful
     * transaction that did not explicitly link to an existing customer profile.
     */
    public const INSTANT_PROFILE = 'INSTANT_PROFILE';

    /**
     * Customer profile created through Square's Virtual Terminal.
     */
    public const TERMINAL = 'TERMINAL';

    /**
     * Customer profile created through a Square API call.
     */
    public const THIRD_PARTY = 'THIRD_PARTY';

    /**
     * Customer profile created by a third-party product and imported
     * through an official integration.
     */
    public const THIRD_PARTY_IMPORT = 'THIRD_PARTY_IMPORT';

    /**
     * Customer profile restored through Square's unmerge recovery
     * process.
     */
    public const UNMERGE_RECOVERY = 'UNMERGE_RECOVERY';
}
