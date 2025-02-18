<?php

namespace Square\Types;

enum CustomerCreationSource: string
{
    case Other = "OTHER";
    case Appointments = "APPOINTMENTS";
    case Coupon = "COUPON";
    case DeletionRecovery = "DELETION_RECOVERY";
    case Directory = "DIRECTORY";
    case Egifting = "EGIFTING";
    case EmailCollection = "EMAIL_COLLECTION";
    case Feedback = "FEEDBACK";
    case Import = "IMPORT";
    case Invoices = "INVOICES";
    case Loyalty = "LOYALTY";
    case Marketing = "MARKETING";
    case Merge = "MERGE";
    case OnlineStore = "ONLINE_STORE";
    case InstantProfile = "INSTANT_PROFILE";
    case Terminal = "TERMINAL";
    case ThirdParty = "THIRD_PARTY";
    case ThirdPartyImport = "THIRD_PARTY_IMPORT";
    case UnmergeRecovery = "UNMERGE_RECOVERY";
}
