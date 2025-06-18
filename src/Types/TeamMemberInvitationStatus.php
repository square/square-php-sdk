<?php

namespace Square\Types;

enum TeamMemberInvitationStatus: string
{
    case Uninvited = "UNINVITED";
    case Pending = "PENDING";
    case Accepted = "ACCEPTED";
}
