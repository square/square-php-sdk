<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Actions that resulted in a change to a timecard. All timecard
 * events created with the Connect API have an event type that begins with
 * `API`.
 */
class V1TimecardEventEventType
{
    /**
     * The timecard was created by a request to the
     * [CreateTimecard](#endpoint-v1employees-createtimecard) endpoint.
     */
    public const API_CREATE = 'API_CREATE';

    /**
     * The timecard was edited by a request to the
     * [UpdateTimecard](#endpoint-v1employees-updatetimecard) endpoint.
     */
    public const API_EDIT = 'API_EDIT';

    /**
     * The timecard was deleted by a request to the
     * [DeleteTimecard](#endpoint-v1employees-deletetimecard) endpoint.
     */
    public const API_DELETE = 'API_DELETE';

    /**
     * The employee clocked in via Square Point of Sale.
     */
    public const REGISTER_CLOCKIN = 'REGISTER_CLOCKIN';

    /**
     * The employee clocked out via Square Point of Sale.
     */
    public const REGISTER_CLOCKOUT = 'REGISTER_CLOCKOUT';

    /**
     * A supervisor clocked out the employee from the merchant
     * dashboard.
     */
    public const DASHBOARD_SUPERVISOR_CLOSE = 'DASHBOARD_SUPERVISOR_CLOSE';

    /**
     * A supervisor manually edited the timecard from the merchant
     * dashboard
     */
    public const DASHBOARD_EDIT = 'DASHBOARD_EDIT';

    /**
     * A supervisor deleted the timecard from the merchant dashboard.
     */
    public const DASHBOARD_DELETE = 'DASHBOARD_DELETE';
}
