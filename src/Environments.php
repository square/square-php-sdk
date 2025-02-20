<?php

namespace Square;

enum Environments: string
{
    case Production = "https://connect.squareup.com";
    case Sandbox = "https://connect.squareupsandbox.com";
}
