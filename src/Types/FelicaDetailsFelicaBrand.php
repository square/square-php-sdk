<?php

namespace Square\Types;

enum FelicaDetailsFelicaBrand: string
{
    case Unknown = "UNKNOWN";
    case FelicaId = "FELICA_ID";
    case FelicaTransportation = "FELICA_TRANSPORTATION";
    case FelicaQp = "FELICA_QP";
}
