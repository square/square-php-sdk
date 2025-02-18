<?php

namespace Square\Types;

enum DisputeState: string
{
    case InquiryEvidenceRequired = "INQUIRY_EVIDENCE_REQUIRED";
    case InquiryProcessing = "INQUIRY_PROCESSING";
    case InquiryClosed = "INQUIRY_CLOSED";
    case EvidenceRequired = "EVIDENCE_REQUIRED";
    case Processing = "PROCESSING";
    case Won = "WON";
    case Lost = "LOST";
    case Accepted = "ACCEPTED";
}
